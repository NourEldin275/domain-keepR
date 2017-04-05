<?php

namespace AppBundle\Util\PasswordManager;

interface TokenInterface{

    public function generateToken($bytes = 10);

    public function verifyToken($token, $token_reference);

}