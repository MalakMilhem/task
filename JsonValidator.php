<?php

/**
 * Created by PhpStorm.
 * User: malak
 * Date: 8/9/17
 * Time: 8:50 AM
 */
class JsonValidator extends Validator
{

    public function load(){
        $this->encodedValue = json_decode($this->string,true);

        return !empty($this->encodedValue);
    }

}