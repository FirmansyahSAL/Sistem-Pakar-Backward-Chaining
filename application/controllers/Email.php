<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . '../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::create(APPPATH);
$dotenv->load();

class Email extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_googleapi');
        $this->load->helper('url');

        $this->client = new Google_Client();
        $this->client->setApplicationName('Gmail API PHP Quickstart');
        $this->client->setScopes(Google_Service_Gmail::GMAIL_SEND);
        $authConfig = array(
            "client_id" => getenv("GOOGLE_API_CLIENT_ID"),
            "project_id" => getenv("GOOGLE_API_PROJECT_ID"),
            "auth_uri" => getenv("GOOGLE_API_AUTH_URI"),
            "token_uri" => getenv("GOOGLE_API_TOKEN_URI"),
            "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
            "client_secret" => getenv("GOOGLE_API_CLIENT_SECRET"),
            "redirect_uris" => array(getenv("GOOGLE_API_REDIRECT_URIS")),
            "javascript_origins" => array(getenv("GOOGLE_API_JAVASCRIPT_ORIGINS")),
        );
        $this->client->setAuthConfig($authConfig);
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');
    }

    function getTokenFromDb()
    {
        $tokens = $this->M_googleapi->get_googleapi();
        if (count($tokens) > 0) {
            return json_decode(json_encode($tokens[0]), true);;
        } else {
            return null;
        }
    }

    function storeTokenToDb($tokenObj)
    {
        $data = array(
            'access_token' => $tokenObj["access_token"],
            'refresh_token' => $tokenObj["refresh_token"],
            'scope' => $tokenObj["scope"],
            'token_type' => $tokenObj["token_type"],
            'created' => $tokenObj["created"],
            'expires_in' => $tokenObj["expires_in"],
        );
        $this->M_googleapi->insert($data);
    }

    // step 1
    function getGoogleAuthUrl()
    {
        printf("GOOGLE_API_AUTH_URI: %s \n", getenv("GOOGLE_API_AUTH_URI"));
        $tokenFromDb = $this->getTokenFromDb();
        print("tokenn from db: \n");
        print_r($tokenFromDb);
        print("\n");
        if (!$tokenFromDb) {
            $authUrl = $this->client->createAuthUrl();
            redirect($authUrl, 'refresh');
        }
    }

    // step 2 after redirect
    function getAccessToken()
    {
        $authCode = trim($this->input->get('code'));
        printf("authCode: %s \n", $authCode);
        // Exchange authorization code for an access token.
        $accessToken = $this->client->fetchAccessTokenWithAuthCode($authCode);
        $this->storeTokenToDb($accessToken);
        $this->client->setAccessToken($accessToken);

        // Check to see if there was an error.
        if (array_key_exists('error', $accessToken)) {
            throw new Exception(join(', ', $accessToken));
        }
        redirect('');
    }

    function getClient()
    {
        // get token from db if exist
        $tokenFromDb = $this->getTokenFromDb();
        if ($tokenFromDb) {
            $this->client->setAccessToken($tokenFromDb);
        }

        // If there is no previous token or it's expired.
        if ($this->client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
            }
        }
        return $this->client;
    }

    /**
     * @param $sender string sender email address
     * @param $to string recipient email address
     * @param $subject string email subject
     * @param $messageText string email text
     * @return Google_Service_Gmail_Message
     */
    function createMessage($sender, $to, $subject, $messageText)
    {
        $message = new Google_Service_Gmail_Message();

        $rawMessageString = "From: <{$sender}>\r\n";
        $rawMessageString .= "To: <{$to}>\r\n";
        $rawMessageString .= 'Subject: =?utf-8?B?' . base64_encode($subject) . "?=\r\n";
        $rawMessageString .= "MIME-Version: 1.0\r\n";
        $rawMessageString .= "Content-Type: text/html; charset=utf-8\r\n";
        $rawMessageString .= 'Content-Transfer-Encoding: quoted-printable' . "\r\n\r\n";
        $rawMessageString .= "{$messageText}\r\n";

        $rawMessage = strtr(base64_encode($rawMessageString), array('+' => '-', '/' => '_'));
        $message->setRaw($rawMessage);
        return $message;
    }

    function sendMessage($service, $userId, $message)
    {
        try {
            $message = $service->users_messages->send($userId, $message);
            print 'Message with ID: ' . $message->getId() . ' sent.';
            return $message;
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
        }
        return null;
    }

    function send()
    {
        $client = $this->getClient();
        $service = new Google_Service_Gmail($client);

        $emailMessage = $this->createMessage("me", "wabahapp@gmail.com", "Testing", "Hey there");
        $this->sendMessage($service, "me", $emailMessage);
    }
}
