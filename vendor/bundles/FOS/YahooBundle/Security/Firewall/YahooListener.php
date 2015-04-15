<?php

/*
 * This file is part of the FOSYahooBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\YahooBundle\Security\Firewall;

use FOS\YahooBundle\Security\Authentication\Token\YahooUserToken;
use Symfony\Component\Security\Http\Firewall\AbstractAuthenticationListener;
use Symfony\Component\HttpFoundation\Request;

/**
 * Yahoo authentication listener.
 */
class YahooListener extends AbstractAuthenticationListener
{
    protected function attemptAuthentication(Request $request)
    {
      if($request->get("openid_oauth_request_token", null))
        return $this->authenticationManager->authenticate(new YahooUserToken($this->providerKey));
      return null;
    }
}
