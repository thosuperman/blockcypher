<?php

namespace ThoNguyen;

use \BlockCypher\Auth\SimpleTokenCredential;
use \BlockCypher\Rest\ApiContext;
use \BlockCypher\Client\AddressClient;

class Addresses
{
    /**
     * @return string
     */
    public static function generateAddress()
    {
        try {
            $config = parse_ini_file(__DIR__ . '/config.ini');

            $apiContext = ApiContext::create(
                $config['NETWORK'], $config['COIN'], $config['VERSION'],
                new SimpleTokenCredential($config['TOKEN']),
                $config
            );

            $addressClient = new AddressClient($apiContext);

            return $addressClient->generateAddress();
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}