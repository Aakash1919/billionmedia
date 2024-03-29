<?php
namespace App\Http\Controllers\GoogleAds;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Google\Auth\CredentialsLoader;
use Google\Auth\OAuth2;
use App\Models\User;
use Auth;

class GoogleAuthenticate extends BaseController{

    protected $oAuth2;
    protected $refreshToken;
  
    public function __construct() {
        $this->middleware('auth');
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
        return $this->oAuth2->buildFullAuthorizationUri(['access_type' => 'offline','prompt'=>'consent',]); 
    }

    public function main(Request $request) {
        if($request->has('code')) {
            $code = $request->get('code');
            $refreshToken =  $this->getRefreshToken($code);
            $user = User::find(Auth::id());
            if(isset($refreshToken)) {
                $user->google_refresh_token = $refreshToken;
                $user->save();
            }else {
                $refreshToken = $user->google_refresh_token;
            }
            return redirect('keyword-planner')->with('status', 'Cnnection Successfully Made'); 
        }
        $url = $this->getRedirectURI();
        return Redirect::to($url);

    }

    public function getRefreshToken($code = null) {
        if(isset($code)) {
            $this->oAuth2->setCode($code);
            $authToken = $this->oAuth2->fetchAuthToken();
            if(isset($authToken) && isset($authToken['refresh_token'])) {
                return $authToken['refresh_token'];               
            }else {
                return null;
            }
        }
    }
}