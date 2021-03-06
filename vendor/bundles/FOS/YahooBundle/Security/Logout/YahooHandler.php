<?php

/*
 * This file is part of the FOSYahooBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\YahooBundle\Security\Logout;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

/**
 * Listener for the logout action
 *
 * This handler will clear the application's Yahoo cookie.
 */
class YahooHandler implements LogoutHandlerInterface
{
    private $yahooApi;

    public function __construct($yahooApi)
    {
        $this->yahooApi = $yahooApi;
    }

    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        
    }
}
