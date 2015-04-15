<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerCodeProvider
 *
 * @author paulaan
 */

namespace Vietland\UserBundle\Security;

use FOS\UserBundle\Security\UserProvider;

class CustomerCodeProvider extends UserProvider {

    /**
     * {@inheritDoc}
     */
    protected function findUser($username) {
        $user = $this->userManager->findUserBy(array('username' => $username));

        if (is_object($user))
            return $user;
        else if ($user = $this->userManager->findUserBy(array('email' => $username)))
            return $user;
        else if ($user = $this->userManager->findUserBy(array('CCode' => $username)))
            return $user;
        else
            return;
    }

}
