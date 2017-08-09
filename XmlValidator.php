<?php

/**
 * Created by PhpStorm.
 * User: malak
 * Date: 8/9/17
 * Time: 11:45 AM
 */
class XmlValidator extends Validator
{
    public function load(){
        $xml = simplexml_load_string($this->string, "SimpleXMLElement", LIBXML_NOCDATA);
        if(empty($xml)) {
            $this->errors = 'invalid xml';
            return false;
        }
        $json = json_encode($xml);
        $this->encodedValue = json_decode($json,TRUE);

        return !empty($this->encodedValue);

    }

}