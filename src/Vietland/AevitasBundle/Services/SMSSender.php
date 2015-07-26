<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Vietland\AevitasBundle\Services;

/**
 * Description of SMSSender
 *
 * @author truongld
 */
class SMSSender {

    private $phone;
    private $sms;
    private $clientNo;
    private $clientPass;
    private $Guid;
    private $returnCode;
    private $returnMsg;
    private $returnTime;

    public function __construct($client, $pass) {
        $this->clientNo = $client;
        $this->clientPass = $pass;
        list($usec, $sec) = explode(" ", microtime());
        $this->Guid = $sec . str_replace('0.', '', $usec) . rand(0, 9); //[sec][usec][random:0-9]
        $this->phone = $this->sms = null;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function setSms($sms) {
        //$this->sms = str_replace(' ', '%20', $sms);
        $this->sms = urlencode($sms);
        return $this;
    }

    public function setGuid($id) {
        $this->Guid = $id;
        return $this;
    }

    public function getGuid() {
        return $this->Guid;
    }

    public function getReturnCode() {
        return $this->returnCode;
    }

    public function getReturnMsg() {
        return $this->returnMsg;
    }

    public function getReturnTime() {
        return $this->returnTime;
    }

    public function send() {
        if ($this->phone == null || $this->sms == null) {
            trigger_error('please set the phone number and the sms content first!');
            return;
        }

        //$this->sms = $this->clean($this->sms);
        //$this->phone='0932170135';
        //$url = 'http://tbfvietnam.com:8083/ForwardMT.asmx/SendSmsChamSocK hachHang?msisdn='.$this->phone.'&alias=LEVIS&message='.$this->sms.'&contentType=0&authenticateUser=bacthanh&authenticatePass=bacthanh123';
//         $url = 
// "http://tbfvietnam.com:8083/ForwardMT.asmx/SendSmsChamSocKhachHang?msisdn=".$this->phone."&alias=LEVIS&message=" 
// .$this->sms. "&contentType=0&authenticateUser=bacthanh&authenticatePass=bacthanh123";
        //file_get_contents("http://tbfvietnam.com:8083/ForwardMT.asmx/SendSmsChamSocKhachHang?msisdn=0906881469&alias=LEVIS&message=abc&contentType=0&authenticateUser=bacthanh&authenticatePass=bacthanh123");
        // return;

        // $url= "https://sms.vht.com.vn/ccsms/json";
        $sms = str_replace("+"," ",$this->sms);
        $sms = str_replace("%3A"," :",$sms);
        $data = array (
                      'submission' => 
                      array (
                        'api_key' => '420355a1',
                        'api_secret' => '21a66509',
                        'sms' => 
                        array (
                          0 => 
                          array (
                            'brandname' => 'Levis',
                            'text' => $sms,
                            'to' => $this->phone,
                          ),
                        ),
                      ),
                    );
        // var_dump(json_encode($data));
        // die();


        // $ch = curl_init();
        // $timeout = 60;
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        // $response = curl_exec($ch);
        // curl_close($ch);

        // $data = '{
        //           "submission":
        //           {
        //              "api_key":"420355a1",
        //              "api_secret":"21a66509",
        //              "sms": [
        //                     {
        //                          "brandname":"Levis",
        //                          "text":"Hi There !",
        //                          "to":"0932170135"
        //                      }
        //                       ]
        //            }
        //         }';

        $url = "https://sms.vht.com.vn/ccsms/json";
        $ch = curl_init(); $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);         
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $response = curl_exec($ch);

        return $response;
    }

    /*clear special character
    */
    function clean($string) {
         $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public function ProcessResponse($response) {
        try {
            $xml = simplexml_load_string($response);
            if ($xml === FALSE) {
                trigger_error("can't parsing XML from response");
            }
            $this->returnCode = $xml->Code;
            $this->returnMsg = $xml->Message;
            $this->returnTime = $xml->Time;
        } catch (\Exception $e) {
            echo $e->getMessage();
            throw new Exception("Error Processing Request", 1);
            
        }
    }

}