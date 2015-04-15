<?php

/*
 * This file is part of the FOSYahooBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\YahooBundle\Security\EntryPoint;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 * YahooAuthenticationEntryPoint starts an authentication via Yahoo.
 *
 */
class YahooAuthenticationEntryPoint implements AuthenticationEntryPointInterface
{
    protected $yahooApi;

    public function __construct($yahooApi)
    {
        $this->yahooApi = $yahooApi;
    }

    /**
     * {@inheritdoc}
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new RedirectResponse($this->yahooApi->createAuthUrl( ));
    }
}
