<?php

//use Google;
//use Google_Service_Indexing;
//use Google_Service_Indexing_UrlNotification;

class home extends Controller
{
    public function index()
    {
        if (isset($_GET["urls"])) {
            $_SESSION["website"] = $_GET["website"];

            try {

                $googleClient = new Google\Client();

                // Add here location to the JSON key file that you created and downloaded earlier.
                $googleClient->setAuthConfig( $_SESSION["website"] . '.json' );
                $googleClient->setScopes(Google_Service_Indexing::INDEXING);

                $service = new Google_Service_Indexing($googleClient);

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

                $urls = $_GET["urls"];
                echo "<div class='message'>";
                foreach ($urls as $url) {
                    if ($url != "")
                    {
                        $postBody = new Google_Service_Indexing_UrlNotification(
                            [
                                'url' => $url,
                                'type' => $type
                            ]
                        );
                        $result = $service->urlNotifications->publish($postBody);
                        echo "Notification time: " . $result->urlNotificationMetadata->latestUpdate["notifyTime"]; //
                        echo "<br>";
                        echo "Notification type: " . $result->urlNotificationMetadata->latestUpdate["type"]; // Notification type.
                        echo "<br>";
                        echo "Url that you submitted: " . $result->urlNotificationMetadata->latestUpdate["url"]; // Url that you submitted.
                        echo "<hr>";

                    }
                }
                echo "</div>";
            } catch (\Exception $e) {
                if (strpos($e->getMessage(),'does not exist') == true) {
                    echo '<div class="message">Website kay??t edilmemi??.</div>';
                }
                else if (strpos($e->getMessage(),'Permission denied. Failed to verify the URL ownership') == true) {
                    echo '<div class="message">Kay??t etti??iniz web site d??????nda bir adresi indexletmeye ??al??????yorsunuz..</div>';
                }else if (strpos($e->getMessage(),'is not in standard URL format:') == true) {
                    echo '<div class="message">URL Format?? yanl???? girildi.</div>';
                } else {
                    echo '<div class="message">Caught exception: ',  $e->getMessage(), "</div>";
                }
            }
        }
        return $this->view('multiple');
    }
}