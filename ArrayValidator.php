<?php

/**
 * Created by PhpStorm.
 * User: malak
 * Date: 8/9/17
 * Time: 11:21 AM
 */
class ArrayValidator extends Validator
{

    public function load()
    {
        $this->encodedValue = $this->string;

        $arrayobject = new ArrayObject($this->encodedValue);
        $iterator = $arrayobject->getIterator();

        return ($iterator->valid());
    }
}