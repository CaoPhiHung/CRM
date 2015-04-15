<?php

// Class 'Yahoo Messenger API' v1.0
// details : send pm to any yahoo messenger IDs via PHP
// (c) Hadi Fanaee , Iran , Mashhad , Kasbarg Information Technology .
// Released under the terms of the GNU Public License
// Website : www.php45.com
// Email : info@php45.com

namespace Vietland\UserBundle\Service\Yahoo;

class YahooMessenger {
    const URL_OAUTH_DIRECT = 'https://login.yahoo.com/WSLogin/V1/get_auth_token';
    const URL_OAUTH_ACCESS_TOKEN = 'https://api.login.yahoo.com/oauth/v2/get_token';
    const URL_YM_SESSION = 'http://developer.messenger.yahooapis.com/v1/session';
    const URL_YM_PRESENCE = 'http://developer.messenger.yahooapis.com/v1/presence';
    const URL_YM_CONTACT = 'http://developer.messenger.yahooapis.com/v1/contacts';
    const URL_YM_MESSAGE = 'http://developer.messenger.yahooapis.com/v1/message/yahoo/{{USER}}';
    const URL_YM_NOTIFICATION = 'http://developer.messenger.yahooapis.com/v1/notifications';
    const URL_YM_NOTIFICATION_LONG = 'http://{{NOTIFICATION_SERVER}}/v1/pushchannel/{{USER}}';
    const URL_YM_BUDDYREQUEST = 'http://developer.messenger.yahooapis.com/v1/buddyrequest/yahoo/{{USER}}';
    const URL_YM_GROUP = 'http://developer.messenger.yahooapis.com/v1/group/{{GROUP}}/contact/yahoo/{{USER}}';

    protected $_oauth;
    protected $_token;
    protected $_ym;
    protected $_config;
    protected $_error;
    public $includeheader = false;
    public $debug = false;

    /*
     * constructor
     */

    public function __construct($consumer_key = '', $secret_key = '', $username = '', $password = '') {
        $this->_config['consumer_key'] = $consumer_key;
        $this->_config['secret_key'] = $secret_key;
        $this->_config['username'] = $username;
        $this->_config['password'] = $password;

        $this->_ym = array();
        $this->_error = null;
    }

    public function fetch_request_token() {
        //prepare url
        $url = $this::URL_OAUTH_DIRECT;
        $url .= '?login=' . $this->_config['username'];
        $url .= '&passwd=' . $this->_config['password'];
        $url .= '&oauth_consumer_key=' . $this->_config['consumer_key'];
        $rs = $this->curl($url);

        if (stripos($rs, 'RequestToken') === false)
            call_user_func(array($this, __FUNCTION__));
        $request_token = trim(str_replace('RequestToken=', '', $rs));
        $this->_token['request'] = $request_token;

        return true;
    }

    public function fetch_access_token() {
        //prepare url
        $url = $this::URL_OAUTH_ACCESS_TOKEN;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26';
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['request'];
        $url .= '&oauth_version=1.0';
        $rs = $this->curl($url);

        if (stripos($rs, 'oauth_token') === false) {
            call_user_func(array($this, __FUNCTION__));
        }

        //parse access token
        $tmp = explode('&', $rs);
        foreach ($tmp as $row) {
            $col = explode('=', $row);
            $access_token[$col[0]] = $col[1];
        }

        $this->_token['access'] = $access_token;

        return true;
    }

    public function fetch_crumb() {
        //prepare url
        $url = $this::URL_YM_SESSION;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $rs = $this->curl($url, 'get', $header);

        if (stripos($rs, 'crumb') === false)
            return false;

        $js = json_decode($rs, true);
        $this->_ym['crumb'] = $js;

        return true;
    }

    public function signon($status = '', $state = 0) {
        //prepare url
        $url = $this::URL_YM_SESSION;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&notifyServerToken=1';

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $postdata = '{"presenceState" : ' . $state . ', "presenceMessage" : "' . $status . '"}';
        $this->includeheader = true;
        $rs = $this->curl($url, 'post', $header, $postdata);
        $this->includeheader = false;
        list($header, $body) = explode("\r\n\r\n", $rs, 2);

        //get IM cookie
        $notifytoken = '';
        if (preg_match('/set-cookie: IM=(.+?); expires/', $header, $m))
            $notifytoken = $m[1];

        if (stripos($body, 'sessionId') === false)
            return false;

        $js = json_decode($body, true);
        $js['notifytoken'] = $notifytoken;
        $this->_ym['signon'] = $js;

        return true;
    }

    public function signoff() {
        //prepare url
        $url = $this::URL_YM_SESSION;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&sid=' . $this->_ym['signon']['sessionId'];

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $rs = $this->curl($url, 'delete', $header);

        return true;
    }

    public function change_presence($status = '', $state = 0) {
        //prepare url
        $url = $this::URL_YM_PRESENCE;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&sid=' . $this->_ym['signon']['sessionId'];

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $postdata = '{"presenceState" : ' . $state . ', "presenceMessage" : "' . $status . '"}';
        $rs = $this->curl($url, 'put', $header, $postdata);

        return true;
    }

    public function send_message($sender, $receiver) {
        $message = json_encode($sender.' đang dùng hệ thống của www.ozeah.com!');
        //prepare url
        $url = $this::URL_YM_MESSAGE;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&sid=' . $this->_ym['signon']['sessionId'];
        $url = str_replace('{{USER}}', $receiver, $url);

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $postdata = '{"message" : ' . $message . '}';

        $rs = $this->curl($url, 'post', $header, $postdata);

        return true;
    }

    public function fetch_contact_list() {
        //prepare url
        $url = $this::URL_YM_CONTACT;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&sid=' . $this->_ym['signon']['sessionId'];
        $url .= '&fields=%2Bpresence';
        $url .= '&fields=%2Bgroups';

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $rs = $this->curl($url, 'get', $header);

        if (stripos($rs, 'contact') === false)
            return false;

        $js = json_decode($rs, true);

        return $js['contacts'];
    }

    public function add_contact($user, $group = 'Friends', $message = '') {
        //prepare url
        $url = $this::URL_YM_GROUP;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&sid=' . $this->_ym['signon']['sessionId'];
        $url = str_replace('{{GROUP}}', $group, $url);
        $url = str_replace('{{USER}}', $user, $url);

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $postdata = '{"message" : "' . $message . '"}';
        $rs = $this->curl($url, 'put', $header, $postdata);

        return true;
    }

    public function delete_contact($user, $group = 'Friends') {
        //prepare url
        $url = $this::URL_YM_GROUP;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&sid=' . $this->_ym['signon']['sessionId'];
        $url = str_replace('{{GROUP}}', $group, $url);
        $url = str_replace('{{USER}}', $user, $url);

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $rs = $this->curl($url, 'delete', $header);

        return true;
    }

    public function response_contact($user, $accept = true, $message = '') {
        if ($accept) {
            $method = 'POST';
            $message == '' ? $reason = 'Welcome' : $reason = $message;
        } else {
            $method = 'DELETE';
            $message == '' ? $reason = 'No thanks' : $reason = $message;
        }

        //prepare url
        $url = $this::URL_YM_BUDDYREQUEST;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&sid=' . $this->_ym['signon']['sessionId'];
        $url = str_replace('{{USER}}', $user, $url);

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $postdata = '{"authReason" : "' . $reason . '"}';
        $this->includeheader = true;
        $rs = $this->curl($url, strtolower($method), $header, $postdata);
        $this->includeheader = true;

        if (strpos($rs, "\r\n\r\n") === false) {
            $this->_error = -20;
            return false;
        }

        list($header, $body) = explode("\r\n\r\n", $rs, 2);

        //get status code
        $code = '';
        if (preg_match('|HTTP/1.1 (.*?) OK|', $header, $m))
            $code = $m[1];

        if ($code != 200) {
            $this->_error = $code;
            return false;
        }

        return true;
    }

    public function fetch_notification($seq = 0) {
        //prepare url
        $url = $this::URL_YM_NOTIFICATION;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&sid=' . $this->_ym['signon']['sessionId'];
        $url .= '&seq=' . intval($seq);
        $url .= '&count=100';

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $rs = $this->curl($url, 'get', $header);

        $js = json_decode($rs, true);

        if (isset($js['error'])) {
            $this->_error = $js['error'];
            return false;
        }

        if (stripos($rs, 'pendingMsg') === false)
            return false;
        if (count($js['responses']) < 1)
            return false;

        $this->_error = null;
        return $js['responses'];
    }

    public function fetch_long_notification($seq = 0) {
        //prepare url
        $url = $this::URL_YM_NOTIFICATION_LONG;
        $url .= '?oauth_consumer_key=' . $this->_config['consumer_key'];
        $url .= '&oauth_nonce=' . uniqid(rand());
        $url .= '&oauth_signature=' . $this->_config['secret_key'] . '%26' . $this->_token['access']['oauth_token_secret'];
        $url .= '&oauth_signature_method=PLAINTEXT';
        $url .= '&oauth_timestamp=' . time();
        $url .= '&oauth_token=' . $this->_token['access']['oauth_token'];
        $url .= '&oauth_version=1.0';
        $url .= '&sid=' . $this->_ym['signon']['sessionId'];
        $url .= '&seq=' . intval($seq);
        $url .= '&format=json';
        $url .= '&count=100';
        $url .= '&idle=120';
        $url .= '&rand=' . uniqid(rand());
        $url .= '&IM=' . $this->_ym['signon']['notifytoken'];

        $url = str_replace('{{NOTIFICATION_SERVER}}', $this->_ym['signon']['notifyServer'], $url);
        $url = str_replace('{{USER}}', $this->_ym['signon']['primaryLoginId'], $url);

        //additional header
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Connection: keep-alive';

        $this->includeheader = true;
        $rs = $this->curl($url, 'get', $header, null, 160);
        $this->includeheader = false;

        if (strpos($rs, "\r\n\r\n") === false) {
            $this->_error = -20;
            return false;
        }

        list($header, $body) = explode("\r\n\r\n", $rs, 2);

        //get status code
        $code = '';
        if (preg_match('|HTTP/1.1 (.*?) OK|', $header, $m))
            $code = $m[1];

        if ($code != 200) {
            $this->_error = $code;
            return false;
        }

        if ($body == '') {
            $this->_error = -10;
            return false;
        }

        $js = json_decode($body, true);

        if (isset($js['error'])) {
            $this->_error = $js['error'];
            return false;
        }

        $this->_error = null;
        return $js['responses'];
    }

    /*
     * fetch url using curl
     */

    private function curl($url, $method = 'get', $header = null, $postdata = null, $timeout = 60) {
        $s = curl_init();

        curl_setopt($s, CURLOPT_URL, $url);
        if ($header)
            curl_setopt($s, CURLOPT_HTTPHEADER, $header);

        if ($this->debug)
            curl_setopt($s, CURLOPT_VERBOSE, TRUE);

        curl_setopt($s, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($s, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($s, CURLOPT_MAXREDIRS, 3);
        curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($s, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($s, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($s, CURLOPT_COOKIEFILE, 'cookie.txt');

        if (strtolower($method) == 'post') {
            curl_setopt($s, CURLOPT_POST, true);
            curl_setopt($s, CURLOPT_POSTFIELDS, $postdata);
        } else if (strtolower($method) == 'delete') {
            curl_setopt($s, CURLOPT_CUSTOMREQUEST, 'DELETE');
        } else if (strtolower($method) == 'put') {
            curl_setopt($s, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($s, CURLOPT_POSTFIELDS, $postdata);
        }

        curl_setopt($s, CURLOPT_HEADER, $this->includeheader);
        curl_setopt($s, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1');
        curl_setopt($s, CURLOPT_SSL_VERIFYPEER, false);

        $html = curl_exec($s);
        $status = curl_getinfo($s, CURLINFO_HTTP_CODE);

        curl_close($s);

        return $html;
    }

    public function get_error() {
        return $this->_error;
    }

}