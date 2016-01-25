<?php
namespace app\common;

/**
 * http rpc
 */
class HttpRpc
{

    private $_headers = [];

    private $_data = [];
    
    private $_timeoutMs = 5000;
    
    private $_connectTimeoutMs = 5000;
    
    private $_supportArrayInQueryString = true;

    // in query string, not use array, when data
    private static function simple_build_query($data) {
        $ret = '';
        foreach($data as $k => $v) {
            if(is_array($v)) {
                foreach($v as $item) {
                $ret .= '&' . http_build_query([$k => $item]);
                }
            } else {
                $ret .= '&' .http_build_query([$k => $v]);
            }
        }
        if(strlen($ret) > 0) {
            $ret = substr($ret, 1);
        }
        return $ret;
    }
    public function setSupportArrayInQueryString($v) {
        $this->_supportArrayInQueryString = $v;
        return $this;
    }
    public function addHeaders($ary)
    {
        $this->_headers = array_merge($this->_headers, $ary);
        return $this;
    }

    public function addHeader($k, $v)
    {
        $this->addHeaders([
            $k => $v
        ]);
        return $this;
    }

    public function addData($ary)
    {
        if (is_array($ary)) {
            $this->_data = array_merge($this->_data, $ary);
        }
        return $this;
    }

    public function setTimeout($timeoutMs)
    {
        $this->_timeoutMs = $timeoutMs;
        return $this;
    }

    public function setConnectTimeout($connectTimeoutMs)
    {
        $this->_connectTimeoutMs = $connectTimeoutMs;
        return $this;
    }

    public function reset()
    {
        $this->_data = [];
        $this->_headers = [];
    }

    /**
     * 发起POST请求
     */
    public function post($uri, $returnObject = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->_headers);
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->_data);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $this->_timeoutMs);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, $this->_connectTimeoutMs);
        
        \Yii::info("http post url: " . $uri . http_build_query($this->_data) , __CLASS__);
        
        try {
            $result = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($result, $returnObject);
            return $data;
        } catch (\Exception $ex) {
            \Yii::warning("http rpc error, " . $ex->getMessage() . $ex->getTraceAsString(), __CLASS__);
        }
        return null;
    }

    /**
     * 发起GET请求
     */
    public function get($uri, $returnObject = null)
    {
        // $url = '';
        if($this->_supportArrayInQueryString) {
            $url = $uri . '?' . http_build_query($this->_data);
        } else {
            $url = $uri . '?' . $this->simple_build_query($this->_data);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->_headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $this->_timeoutMs);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, $this->_connectTimeoutMs);
        curl_setopt($ch, CURLOPT_URL, $url);
        
        \Yii::info("http get url: " . $url, __CLASS__);
        try {
            $result = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($result, $returnObject);
            return $data;
        } catch (\Exception $ex) {
            \Yii::warning("http rpc error, " . $ex->getMessage() . $ex->getTraceAsString(), __CLASS__);
        }
        return null;
    }
}