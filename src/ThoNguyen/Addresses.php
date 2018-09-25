<?php

namespace ThoNguyen;

class Addresses
{
    /**
     * @return string
     */
    public static function generateAddress()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__);
        $dotenv->load();

        $addressClient = new \BlockCypher\Client\AddressClient(getenv('NETWORK'));
        try {
            return $addressClient->generateAddress();
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}