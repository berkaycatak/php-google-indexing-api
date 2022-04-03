<?php

//use Google;
//use Google_Service_Indexing;
//use Google_Service_Indexing_UrlNotification;

class home extends Controller
{
    public function index()
    {
        try {
            $googleClient = new Google\Client();

            // Add here location to the JSON key file that you created and downloaded earlier.
            $googleClient->setAuthConfig( 'lyra-media-35279d101c92.json' );
            $googleClient->setScopes( Google_Service_Indexing::INDEXING );
            $googleIndexingService = new Google_Service_Indexing( $googleClient );

            // Use URL_UPDATED for new or updated pages.
            // Use URL_DELETED for deleted pages.
            $urlNotification = new Google_Service_Indexing_UrlNotification([
                'url' => $_GET["url"],
                'type' => 'URL_UPDATED'
            ]);

            $result = $googleIndexingService->urlNotifications->publish( $urlNotification );

            /*
              Because we are using try-catch there is no real need for checking the result in the
              try -block. But if you want to access the values that Google returns, below are
              the examples.
                print_r($result->urlNotificationMetadata->latestUpdate["notifyTime"]); // Notification time.
                echo "<br>";
                print_r($result->urlNotificationMetadata->latestUpdate["type"]); // Notification type.
                echo "<br>";
                print_r($result->urlNotificationMetadata->latestUpdate["url"]); // Url that you submitted.
            */
            print_r($result->urlNotificationMetadata->latestUpdate["notifyTime"]); // Notification time.
            echo "<br>";
            print_r($result->urlNotificationMetadata->latestUpdate["type"]); // Notification type.
            echo "<br>";
            print_r($result->urlNotificationMetadata->latestUpdate["url"]); // Url that you submitted.


        }
        catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

        /*
        require_once 'vendor/autoload.php';

        $client = new Google_Client();

        // service_account_file.json is the private key that you created for your service account.
        $client->setAuthConfig('lyra-media-35279d101c92.json');
        $client->addScope('https://www.googleapis.com/auth/indexing');

        // Get a Guzzle HTTP Client
        $httpClient = $client->authorize();
        $endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';

        // Define contents here. The structure of the content is described in the next step.
        $content = '{
          "url": "https://www.medialyra.com/internet-sitesi/",
          "type": "URL_UPDATED"
        }';

        $response = $httpClient->post($endpoint, [ 'body' => $content ]);
        $status_code = $response->getReasonPhrase();
        print_r($status_code);
        //print_r($response);
        //$this->view('site/header', []);
        */
    }
}