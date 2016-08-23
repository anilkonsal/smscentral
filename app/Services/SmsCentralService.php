<?php
namespace App\Services;

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Config;

class SmsCentralService {

    public function sendSms() {
        /*
        Get the configration for smscentral
         */
        $conf = Config::get('app.smscentral');

        /*
        Make new Guzzle Client for making request
         */
        $client = new Client();

        /*
        Send actual post request with the parameters
         */
        $data = $client->post($conf['url'],[
            'body'  =>  [
                'USERNAME'  =>  $conf['username'],
                'PASSWORD'  =>  $conf['password'],
                'ACTION'    =>  'send',
                'ORIGINATOR'    =>  'shared',
                'RECIPIENT' =>  '61420314421',
                'MESSAGE_TEXT'  =>  'Name: Anil Konsal. Email: anil.konsal@gmail.com'
            ]
        ])->getBody()->getContents();

        /*
        If the response was 0, then its success
         */
        if ($data === 0) {
            $response = 'Message was sent successfullly';
        } else {
        /*
        Else we got an error;
         */
            $response = $data;
        }

        return $response;
    }
}
