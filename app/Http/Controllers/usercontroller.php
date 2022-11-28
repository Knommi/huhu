<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Nexmo\Client\Credentials\Basic;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class usercontroller extends Controller
{
    public function sendSmsNotificaition()
    {
    
        $basic  = new \Vonage\Client\Credentials\Basic("32833e26", "eY12dMcqkiWU7sQC");
        $client = new \Vonage\Client($basic);
 
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("919316071733", 'BRAND_NAME', 'A text message sent using the Nexmo SMS API')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

    // public function __construct(){
    //     $user = User::find($user_id);
    //     if (!$user) {
    //         throw new ModelNotFoundException('User not found by ID ' . $user_id);
    //     }
    //     return $user;
    // }


  
}
