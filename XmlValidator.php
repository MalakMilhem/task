<?php

/**
 * Created by PhpStorm.
 * User: malak
 * Date: 8/9/17
 * Time: 11:45 AM
 * this class is child of Validator class
 * here u can modify a Xml or update it in any way you want
 * it's a class to deal with XML
 */
class XmlValidator extends Validator
{
    //here we load the decodedValue and extract the array from the XML
    public function load(){
        $xml = simplexml_load_string($this->string, "SimpleXMLElement", LIBXML_NOCDATA);
        if(empty($xml)) {
            $this->errors = 'invalid xml';
            return false;
        }
        $json = json_encode($xml);
        $this->decodedValue = json_decode($json,TRUE);

        return !empty($this->decodedValue);

    }

}