<?php
// https://www.localhost/FacebookLogin/ 
session_start();
    ob_start();
    require __DIR__ . "/vendor/autoload.php";

    if(empty($_SESSION["userLogin"])){
        echo "<h1>Facebook Login</h1>";

        $facebook = new \League\OAuth2\Client\Provider\Facebook([
            'clientId'          => '{facebook-app-id}',
            'clientSecret'      => '{facebook-app-secret}',
            'redirectUri'       => 'https://example.com/callback-url',
            'graphApiVersion'   => 'v2.10',
        ]);

        $authUrl = $facebook->getAuthorizationUrl([
            "scope" => ["email"]
        ]);

        $error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_STRIPPED);
        if($error){
            echo "você precisa autorizar";
        }

        $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRIPPED);
        if($code){
            $token = $facebook->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);

            $_SESSION["userLogin"] = $facebook->getResourceOwner($token);
            var_dump($_SESSION["userLogin"]);
            header("Refresh:0");
        }

        echo "<a title='FB Login' href='{$authUrl}'>Facebook Login</a>";

    } else {
        $user = unserialize(serialize($_SESSION["userLogin"]));
        
        $name = $user->getName();
        var_dump($name);
        
        echo "<h1>Olá {$name}</h1>";
        $email = $user->getEmail();
        var_dump($email);

        session_destroy();
    }

    ob_end_flush();
?>