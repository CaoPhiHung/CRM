<?php

/*
 * This file is part of the FOSYahooBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\YahooBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    public function loginAction()
    {
      $yahooApi = $this->get("fos_yahoo.api");
      return $this->redirect($yahooApi->createAuthUrl());
    }
}
