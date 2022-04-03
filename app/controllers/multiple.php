<?php

//use Google;
//use Google_Service_Indexing;
//use Google_Service_Indexing_UrlNotification;

class multiple extends Controller
{
    public function index()
    {
        try {
            $googleClient = new Google\Client();

            // Add here location to the JSON key file that you created and downloaded earlier.
            $googleClient->setAuthConfig( 'lyra-media-35279d101c92.json' );
            $googleClient->setScopes( Google_Service_Indexing::INDEXING );

            $service = new Google_Service_Indexing( $googleClient );

            // Use URL_UPDATED for new or updated pages = 1.
            // Use URL_DELETED for deleted pages = 2.
            if (isset($_GET["method"])) {
                if ($_GET["method"] == 1)
                    $type = "URL_UPDATED";
                if ($_GET["method"] == 2)
                    $type = "URL_DELETED";
            } else {
                $type = "URL_UPDATED";
            }

            if (!isset($_GET["urls"])) die("Bad request, url not found. try: ?urls[]=https://www.your-website.com&urls[]=https://www.your-website.com/contact");


            $urls = $_GET["urls"];

            foreach($urls as $url)
            {
                $postBody = new Google_Service_Indexing_UrlNotification(
                    [
                        'url' => $url,
                        'type' => $type
                    ]
                );
                $result = $service->urlNotifications->publish( $postBody );
                echo "Notification time: " . $result->urlNotificationMetadata->latestUpdate["notifyTime"]; //
                echo "<br>";
                echo "Notification type: " . $result->urlNotificationMetadata->latestUpdate["type"]; // Notification type.
                echo "<br>";
                echo "Url that you submitted: " . $result->urlNotificationMetadata->latestUpdate["url"]; // Url that you submitted.
                echo "<br>";

            }
        }
        catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}