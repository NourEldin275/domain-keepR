<?php
/**
 * Created by PhpStorm.
 * User: Windows 7
 * Date: 4/4/2017
 * Time: 4:29 PM
 */

namespace AppBundle\Util\PasswordManager;


class TokenManager implements TokenInterface
{

    public function generateToken($bytes = 10)
    {

        $token = base64_encode( random_bytes($bytes) );

        return $token;
    }

    public function verifyToken($token, $token_reference)
    {

        return hash_equals($token_reference, $token);
    }

}