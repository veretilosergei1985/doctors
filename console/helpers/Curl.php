<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Curl
 *
 * @author sveretilo
 */
namespace console\helpers;

class Curl {
    
    private $url;
    private $handle;
    private $content;
    
    public function __construct($url) {
        $this->url = $url;
    }

    public function GET()
    {
        $this->curlInit(); 
        $this->execute();
        $this->close();    
        
        $content = $this->getContent();        
        return $content;
    }
    
    private function curlInit()
    {
        if (empty($this->handle)) {
            $this->handle = curl_init();
        }
    }    

    private function execute()
    {
        $this->curlInit();
        curl_setopt($this->handle, CURLOPT_URL, $this->url);
        curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->handle, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($this->handle, CURLOPT_HEADER, true);
        $content = curl_exec($this->handle);
        $curlInfo = curl_getinfo($this->handle);   
        
        if ($curlInfo['http_code'] !== 200) {
            throw new \Exception(curl_error($this->handle), $curlInfo['http_code']);
        } else {
            $this->content = $this->parseContent($curlInfo, $content);
        }
    }

    private function close()
    {
        curl_close($this->handle);
    }
    
    private function parseContent($curlInfo, $content)
    {
        $headerSize = isset($curlInfo['header_size']) ? (int)$curlInfo['header_size'] : 0;

        return substr($content, $headerSize);
    }
    
    public function getContent($asJson = false)
    {
        if ($asJson) {
            return json_decode(trim($this->content));
        }
        
        return trim($this->content);
    }
}
