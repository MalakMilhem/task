<?php

/**
 * Created by PhpStorm.
 * User: malak
 * Date: 8/9/17
 * Time: 9:36 AM
 */
class Transaction
{

    public $transaction;

    public function setTransaction($trans){
        $this->transaction = $trans;
    }

    function __construct($trans){
        $this->transaction = $trans;
    }

    public function checkStructure(){
        if($this->checkTaxeStructure()){
            if($this->checkIfValidTaxeAmmout())
                return $this->checkAmount();
            else
                return 'taxe  rate is too large';
        }
        return 'Structure has some Data missing';
    }


    public function checkAmount(){
        return ($this->transaction ['itemization'][0]['net_sales_money']['amount'] +
                $this->transaction ['taxes'][0]['applied_money']['amount'])
            == $this->transaction ['total_collected_money']['amount'];
    }

    public function checkIfValidTaxeAmmout(){
        return $this->transaction ['taxes'][0]['applied_money']['amount']< $this->transaction ['total_collected_money']['amount'];
    }

    public function checkTaxeStructure(){
        return (isset($this->transaction ['taxes'][0]['id']) &&
            isset($this->transaction ['taxes'][0]['name'])  &&
            isset($this->transaction ['taxes'][0]['rate'])  &&
            isset($this->transaction ['taxes'][0]['inclusion_type'])  &&
            isset($this->transaction ['taxes'][0]['is_custom_amount'])  &&
            isset($this->transaction ['taxes'][0]['applied_money'])  &&
            isset($this->transaction ['taxes'][0]['applied_money']['amount'])  &&
            isset($this->transaction ['taxes'][0]['applied_money']['currency'])
        );
    }
}