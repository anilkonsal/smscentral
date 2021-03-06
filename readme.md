# SMS Central project
This project has been developed using Laravel 5.2 with Controller/Service pattern. for setting up this project. GuzzleHttp Client has been used to sent the post request to the SMS Central send sms API call.

## Steps to run locally
1. Clone the code of this Repository.
2. On the shell, change to the newly created folder and run this command

    ```
    composer update
    ```
3. Create the virtualhost for apache (say sms.local) to point to /path/to/project/public

    ```
    <VirtualHost *:80>
        ServerName sms.local
        DocumentRoot "/Library/WebServer/Documents/sms/public"

        <Directory "/Library/WebServer/Documents/sms/public">
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
    ```
4. In the local hosts file, point sms.local to 127.0.0.1

    ```
    127.0.0.1       sms.local
    ```
5. Open config/app.php file and put your API details in 'smscentral' sections

    ```
    'smscentral' => [
            'url'   =>  '<put url here>',
            'username'   =>  '<put your username>',
            'password'   =>  '<put your password>',
        ]
    ```
6. Navigate to sms.local in the browser. You will see the basic landing page of project. Click on 'Send SMS' button and wait for the processing done.


## General Description

1. The Controller used for sending SMS is SmsController placed in 'app/Http/Controllers/SmsController.php'.
2. This controller uses a Service named SmsCentralSevice placed in 'app/Services/SmsCentralSevice.php'
3. I have used the GuzzleHttp Library for making a POST Request to the SMS Central RESTful API.
4. Here is the main code that sends the SMS.

    ```
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
    ```
