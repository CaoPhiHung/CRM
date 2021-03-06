<?php

namespace FOS\YahooBundle\Security\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;

interface UserManagerInterface extends UserProviderInterface
{
    function createUserFromUid($uid);
}