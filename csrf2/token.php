<?php

class token {

    //method to generate a random token
    public static function generateToken(){
        $token = base64_encode(openssl_random_pseudo_bytes(32));

        return $token;
    }
    
    //method to compare the passed token with the token received from the cookie
	public static function compareTokens($token,$cookieToken){

        if($token == $cookieToken){
            return true;
        }
        else{
            return false;
        }
    }
    
}
?>