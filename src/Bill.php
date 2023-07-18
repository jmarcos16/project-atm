<?php

namespace Src;

use Src\traits\ValidatedBill;

class Bill
{
    use ValidatedBill;
    private array $bill = [];

    public function addBill(int $value): Bill
    {
        $this->validatedBill($value);
        $this->bill[] = $value;
        return $this;
    }

    public function getBill() : array
    {
        return $this->bill;
    }
}
