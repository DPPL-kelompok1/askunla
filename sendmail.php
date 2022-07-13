<?php
  require 'vendor/autoload.php';
  use \Mailjet\Resources;
  
  function SendMailjet()
  {
    # code...
    $mj = new \Mailjet\Client('eeff72d050b4d364080d6a1b4b4dda20','0fdd4209c29a0915863eb2f9efb8ee9b',true,['version' => 'v3.1']);
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "pwftubes21@gmail.com",
            'Name' => "ASKUNLA"
          ],
          'To' => [
            [
              'Email' => "dzalbarry25@gmail.com",
              'Name' => "Rifky Dzalbarry"
            ]
          ],
          'Subject' => "Greetings from Mailjet.",
          'TextPart' => "My first Mailjet email",
          'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
          'CustomID' => "AppGettingStartedTest"
        ]
      ]
    ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    $response->success() && var_dump($response->getData());
  }
  
  
  
?>
