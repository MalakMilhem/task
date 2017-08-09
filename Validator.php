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
 * this class Used to make general validation of string
 *and check the sting type -json,xml or array-
 *
 */
class Validator
{
    //*const variables represent classes names
    const JSON_VALIDATOR = 'JsonValidator';
    const ARRAY_VALIDATOR = 'ArrayValidator';
    const XML_VALIDATOR = 'XmlValidator';

    //*public attributes string is the valirable which we read it
    // encodedValue the string after we decode it mainly its array
    public $string;
    public $decodedValue;

    public function set($string){
        $this->string = $string;
    }

    //this function use to check the type of string
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