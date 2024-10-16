<?php

namespace App;

use Stringable;

class Transaction implements Stringable {
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

    public function __toString(){
        return "{$this->description}, amount: \${$this->amount}";
    }
}