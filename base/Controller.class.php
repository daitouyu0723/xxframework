<?php
class Controller {

    protected $ch = '';

    public function __construct() {

    }
    
    protected function curl($url, $content, array $options = null) {
        $this->ch = curl_init($url);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        if(!empty($options)) {
            //php version > 5.1.3
            curl_setopt_array($this->ch, $options);
        }
        $output = curl_exec($this->ch);
        curl_close($this->ch);
        return $output === FALSE ? NULL : simplexml_load_string($output);
    }
}
