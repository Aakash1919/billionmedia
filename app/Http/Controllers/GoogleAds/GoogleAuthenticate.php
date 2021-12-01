<?php
namespace App\Http\Controllers\GoogleAds;

use Illuminate\Routing\Controller as BaseController;
use Google\Auth\CredentialsLoader;
use Google\Auth\OAuth2;

class GoogleAuthenticate extends BaseController{

    protected $oAuth2;

    public function __construct() {
        $this->oAuth2 = $this->setOAuth();
    }

    public function setOAuth() {
        $oauth2 = new OAuth2(
            [
                'authorizationUri' => env('GOOGLE_AUTHORIZATION_URI'),
                'redirectUri' => env('GOOGLE_REDIRECT_URI'),
                'tokenCredentialUri' => CredentialsLoader::TOKEN_CREDENTIAL_URI,
                'clientId' => env('CLIENT_ID'),
                'clientSecret' => env('CLIENT_SECRET'),
                'scope' => env('GOOGLE_SCOPE')
            ]
        );
        return $oauth2;
    }

    public function getRedirectURI() {
        return $this->oAuth2->buildFullAuthorizationUri(); 
    }

    public function main()
    {
        echo $url = $this->getRedirectURI();
        $this->getRefreshToken();    
    }

    public function getRefreshToken($code = null) {
        if(isset($code)) {
            $this->oAuth2->setCode($code);
            $authToken = $this->oAuth2->fetchAuthToken();
            print_r($authToken);
        }
    }
}