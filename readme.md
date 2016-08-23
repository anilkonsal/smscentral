# SMS Central project
This project has been developed using Laravel 5.2 with Controller/Service pattern. for setting up this project. GuzzleHttp Client has been used to sent the post request to the SMS Central send sms API call.

## Steps to run locally
1. Clone the code of this Repository, then create a database on your local system.
2. On the shell, run this command
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
5. Open config/app.php file and put your API Key in 'smscentral' sections
    ```
    'smscentral' => [
            'url'   =>  '<put url here>',
            'username'   =>  '<put your username>',
            'password'   =>  '<put your password>',
        ]
    ```
6. Navigate to sms.local in the browser. You will see the basic landing page of project. Click on 'Send SMS' button and wait for the processing done.
