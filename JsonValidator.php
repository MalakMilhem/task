<?php

/**
 * Created by PhpStorm.
 * User: malak
 * Date: 8/9/17
 * Time: 8:50 AM
 * this class is child of Vaidator class
 * here u can modify a json or update it in any way you want
 * it's aclass to deal with json
 */
class JsonValidator extends Validator
{
    //here we load the decodedValue and extract the array from the json
    public function load(){
        $this->decodedValue = json_decode($this->string,true);

        return !empty($this->decodedValue);
    }

}