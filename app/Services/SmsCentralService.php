<?php
namespace App\Services;

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Config;

class SmsCentralService {

    public function sendSms() {
        $conf = Config::get('app.smscentral');

        $client = new Client();

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

        return $data;
    }
}
