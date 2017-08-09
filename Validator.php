<?php
require_once('JsonValidator.php');
require_once('ArrayValidator.php');
require_once('XmlValidator.php');
require_once('Transaction.php');

/**
 * Created by PhpStorm.
 * User: malak
 * Date: 8/9/17
 * Time: 8:44 AM
 */
class Validator
{
    const JSON_VALIDATOR = 'JsonValidator';
    const ARRAY_VALIDATOR = 'ArrayValidator';
    const XML_VALIDATOR = 'XmlValidator';

    public $string;
    public $encodedValue;

    public function set($string){
        $this->string = $string;
    }

    public static function getStringType($string){
        if(self::isJson($string)){
            return self::JSON_VALIDATOR;
        }elseif (self::isArray($string)){
            return self::ARRAY_VALIDATOR;
        }elseif (self::isXml($string)){
            return self::XML_VALIDATOR;
        }else
            return false;
    }

    public static function isJson($string){
        return is_string($string) && is_array(json_decode($string, true))
            ? true : false;
    }

    public static function isArray($string){
        return is_array($string);
    }

    public static function isXml($string){
        $doc = @simplexml_load_string($string);
        if ($doc) {
            return true; //this is valid
        }
        return false; //this is not valid
    }
}