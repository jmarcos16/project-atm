<?php

namespace Src;

class Withdraw
{
    private Bill $bill;
    private array $withdraw = [];

    public function __construct($bill)
    {
        $this->bill = $bill;
    }

    /**
     * Return the quantity of bills
     *
     * @param int $value
     * @return array
     */
    public function ammount(int $value): array
    {
        $this->withdraw = [];

        $bill = $this->bill->getBill();

        rsort($bill);

        foreach ($bill as $b) {

            $quantity = intdiv($value, $b);
            if ($quantity > 0) {
                $this->withdraw[$b] = $quantity;
                $value -= $quantity * $b;
            }
        }

        if ($value > 0) {
            throw new \Exception('Não é possível sacar este valor');
        }
        return $this->withdraw;
    }
}
