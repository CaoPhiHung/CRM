<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GoogleProvider
 *
 * @author paul.aan
 */

namespace Vietland\UserBundle\Security\User\Provider;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Vietland\UserBundle\Document\User;

class YahooProvider implements UserProviderInterface {

    /**
     * @var \GoogleApi
     */
    protected $yahooApi;
    protected $userManager;
    protected $validator;
    protected $em;

    public function __construct($yahooApi, $userManager, $validator, $dm) {
        $this->yahooApi = $yahooApi;
        $this->userManager = $userManager;
        $this->validator = $validator;
        $this->em = $dm;
    }

    public function supportsClass($class) {
        return $this->userManager->supportsClass($class);
    }

    public function findUserByGIdOrEmail($gId, $email = null) {
        $user = $this->userManager->findUserByUsernameOrEmail($email);
        if (!$user)
            $user = $this->userManager->findUserBy(array('uid' => $gId));
        return $user;
    }

    public function loadUserByUsername($username) {
        try {
            $gData = $this->yahooApi->getOAuthProfile();
        } catch (\Exception $e) {
            $gData = null;
        }

        $user = $this->findUserByGIdOrEmail($username, isset($gData['email']) ? $gData['email'] : null );

        if (!empty($gData)) {
            if (empty($user)) {
                $user = $this->userManager->createUser();
                $user->setEnabled(true);
                $user->setPlainPassword($gData['email']);
                $this->userManager->updatePassword($user);
                $user->setRoles(array('ROLE_USER'));
            }

            if (isset($gData['id'])) {
                $user->setType(User::GOOGLE)->setGuid($gData['id']);
            }
            if (isset($gData['name'])) {
                $nameAndLastNames = explode(" ", $gData['name']);
                if (count($nameAndLastNames) > 1) {
                    $user->setFirstname($nameAndLastNames[0])->setLastname($nameAndLastNames[1]);
                } else {
                    $user->setFirstname($nameAndLastNames[0])->setLastname("");
                }
            }
            if (isset($gData['email'])) {
                $user->setEmail($gData['email']);
                $user->setUsername($gData['email']);
            } else {
                $user->setEmail($gData['id'] . "@yahoo.com");
                $user->setUsername($gData['id'] . "@yahoo.com");
            }
            $this->userManager->updateCanonicalFields($user);

            if (count($this->validator->validate($user, 'Google'))) {
                // TODO: the user was found obviously, but doesnt match our expectations, do something smart
                throw new UsernameNotFoundException('The yahoo user could not be stored');
            }
            $this->userManager->updateUser($user);
        }

        if (empty($user)) {
            throw new UsernameNotFoundException('The user is not authenticated on yahoo');
        }

        return $user;
    }

    public function refreshUser(UserInterface $user) {
        if (!$this->supportsClass(get_class($user)) || !$user->getGuid()) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getGuid());
    }

}