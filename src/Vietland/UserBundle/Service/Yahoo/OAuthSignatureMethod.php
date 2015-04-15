<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Oath
 *
 * @author paulaan
 */
namespace Vietland\UserBundle\Service\Yahoo;
class OAuthSignatureMethod {
  public function check_signature(&$request, $consumer, $token, $signature) {
    $built = $this->build_signature($request, $consumer, $token);
    return $built == $signature;
  }
}