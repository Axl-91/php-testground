<?php

class Transaction {
    public function __construct(
        private float $amount = 0, 
        private string $description = ''
    ){}

    public function getAmount(){
        return $this->amount;
    }

    public function getDescription(){
        return $this->description;
    }
}