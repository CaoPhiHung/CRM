<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OAuthSignatureMethod_PLAINTEXT
 *
 * @author paulaan
 */

namespace Vietland\UserBundle\Service\Yahoo;
class OAuthSignatureMethodPlainText extends OAuthSignatureMethod {
  public function get_name() {
    return "PLAINTEXT";
  }

  public function build_signature($request, $consumer, $token) {
    $sig = array(
      OAuthUtil::urlencode_rfc3986($consumer->secret)
    );

    if ($token) {
      array_push($sig, OAuthUtil::urlencode_rfc3986($token->secret));
    } else {
      array_push($sig, '');
    }

    $raw = implode("&", $sig);
    // for debug purposes
    $request->base_string = $raw;

    return OAuthUtil::urlencode_rfc3986($raw);
  }
}