<?php

/**
 * Created by PhpStorm.
 * User: malak
 * Date: 8/9/17
 * Time: 11:21 AM
 *this class is child of Validator class
 * here u can modify a array or update it in any way you want
 * it's a class to deal with arrays
 */
class ArrayValidator extends Validator
{
    //here we load the decodedValue and check if the array is nested
    public function load()
    {
        $this->decodedValue = $this->string;

        $arrayobject = new ArrayObject($this->decodedValue);
        $iterator = $arrayobject->getIterator();

        return ($iterator->valid());
    }
}