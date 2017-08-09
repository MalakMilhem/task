<?php
require_once('Validator.php');

$sting = file_get_contents('sample');
$stringType = Validator::getStringType($sting);

if(class_exists($stringType)) {
   $model = new $stringType();
   $model->set($sting);
   if ($model->load()) {
       echo "Valid String \n";
       $transaction = new Transaction($model->encodedValue);

       if ($transaction->checkStructure())
           echo 'Data is right';
       else
           echo 'Data is invalid';

   }
}else
   echo 'undifine data type';