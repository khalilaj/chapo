<?php
namespace App\Http\Controllers;
//include Africas Talking API
require_once base_path().'/vendor/africastalking/AfricasTalkingGateway.php';

use Illuminate\Http\Request;

class KumbushaaController extends Controller
{
    //method
    public function kmb(){

        $recipients = '+254733299205';
        $message = 'Remember ';
        KumbushaaController::tuma($recipients,$message);
    }

    //send sms via africastalking...
    public static function tuma($recipients,$message){
        // Specify your authentication credentials
        $username   = env('AFRICASTLKNG_USERNAME');
        $apikey     = env('AFRICASTLKNG_KEY');
        $app_name = env('AFRICASTLKNG_APP_NAME');

        // Create a new instance of our awesome gateway class
        $gateway    = new \AfricasTalkingGateway($username, $apikey,$app_name);

        try
        {
          // Thats it, hit send and we'll take care of the rest.
          $results = $gateway->sendMessage($recipients, $message);

          //simple result message
          $status = 'Sent';
          foreach($results as $result) {
            echo "<p>**=================================**</p>";
            echo "<ul><li>Message : {$message} to <b>{$result->number}</b></li>";
            echo "<li>Status: " .$result->status.'</li></ul>';
            echo "<p>|*==================================*|</p>";
          }
        }
        catch ( \AfricasTalkingGatewayException $e )
        {
          echo "Encountered an error while sending: ".$e->getMessage();
        }
    }

}
