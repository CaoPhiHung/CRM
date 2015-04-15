<?php

namespace FOS\YahooBundle\Yahoo;

use Symfony\Component\HttpFoundation\Session\Session;
use Vietland\UserBundle\Service\Yahoo\YahooOAuthApplication;
use Vietland\UserBundle\Service\Yahoo\YahooOAuthRequestToken;
use Vietland\UserBundle\Service\Yahoo\YahooOAuthAccessToken;

/**
 * Implements Symfony2 session persistence API for Yahoo.
 *
 */
class YahooSessionPersistence extends YahooOAuthApplication {

    const PREFIX = '_fos_yahoo_';

    private $oauth;
    private $session;
    private $prefix;
    protected static $kSupportedKeys = array('state', 'code', 'access_token', 'user_id');

    public function __construct($config, Session $session, $prefix = self::PREFIX) {
        parent::__construct($config["client_id"], $config["client_secret"], $config["redirect_uri"]);
        $this->session = $session;
        $this->prefix = $prefix;
        $this->session->start();
    }

    public function getOAuthProfile() {
        return $this->getProfile();
    }

    /**
     * Stores the given ($key, $value) pair, so that future calls to
     * getPersistentData($key) return $value. This call may be in another request.
     *
     * @param string $key
     * @param array $value
     *
     * @return void
     */
    protected function setPersistentData($key, $value) {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to setPersistentData.');
            return;
        }

        $this->session->set($this->constructSessionVariableName($key), $value);
    }

    /**
     * Get the data for $key
     *
     * @param string $key The key of the data to retrieve
     * @param boolean $default The default value to return if $key is not found
     *
     * @return mixed
     */
    protected function getPersistentData($key, $default = false) {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to getPersistentData.');
            return $default;
        }

        $sessionVariableName = $this->constructSessionVariableName($key);
        if ($this->session->has($sessionVariableName)) {
            return $this->session->get($sessionVariableName);
        }

        return $default;
    }

    /**
     * Clear the data with $key from the persistent storage
     *
     * @param string $key
     * @return void
     */
    protected function clearPersistentData($key) {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to clearPersistentData.');
            return;
        }

        $this->session->remove($this->constructSessionVariableName($key));
    }

    /**
     * Clear all data from the persistent storage
     *
     * @return void
     */
    protected function clearAllPersistentData() {
        foreach ($this->session->all() as $k => $v) {
            if (0 !== strpos($k, $this->prefix)) {
                continue;
            }

            $this->session->remove($k);
        }
    }

    protected function constructSessionVariableName($key) {
        return $this->prefix . implode('_', array('g', $this->getAppId(), $key,));
    }
    
    public function createAuthUrl(){
        return $this->getOpenIDUrl(isset($_REQUEST['popup']) ? $this->yahooApi->callback_url . '?close=true' : $this->yahooApi->callback_url);
    }

}
