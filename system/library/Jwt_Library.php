<?php

use \Firebase\JWT\JWT;

class Jwt_Library {
    function my_encode($token,$key){
        require 'jwt/JWT.php';

        $jwt1 = new JWT(true);
        return $jwt1->encode($token,$key);
    }

    function my_decode($token,$key,$algs = array('HS256')){
        require 'jwt/JWT.php';
        require 'jwt/BeforeValidException.php';
        require 'jwt/ExpiredException.php';
        require 'jwt/SignatureInvalidException.php';

        $jwt2 = new JWT(true);

        $result = array(
            'code'=>200,
            'data'=>null
        );

        try {
            $result['data'] = $jwt2->decode($token, $key, $algs);
        } catch (Exception $e) {
            $result['code'] = 500 ;
        }

        return $result;
    }

    function example(){
        require 'jwt/JWT.php';
        require 'jwt/BeforeValidException.php';
        require 'jwt/ExpiredException.php';
        require 'jwt/SignatureInvalidException.php';

        $jwt1 = new JWT(true);

        $key = "example_key";
        $payload = array(
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => 1356999524,
            "nbf" => 1357000000
        );

        /**
         * IMPORTANT:
         * You must specify supported algorithms for your application. See
         * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
         * for a list of spec-compliant algorithms.
         */
        $code = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDB9.KcNaeDRMPwkRHDHsuIh1L2B01VApiu3aTOkWplFjoYI';
        $jwt = $jwt1->encode($payload, $key); //echo $jwt;
        $decoded = $jwt1->decode($code, $key, array('HS256'));

        print_r($decoded);
    }
}
