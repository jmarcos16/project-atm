<?php

namespace Src;

use Src\Bill;
use Src\Withdraw;

class Atm
{
    private Bill $bill;

    public function __construct()
    {
        $this->bill = new Bill();
    }


    public function bill(): Bill
    {
        return $this->bill;
    }

    public function withdraw(): Withdraw
    {
        return new Withdraw($this->bill);
    }

}
