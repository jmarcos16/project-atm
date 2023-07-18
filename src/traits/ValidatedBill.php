<?php

namespace Src\traits;

trait ValidatedBill
{
    private array $aceeptedBills = [200, 100, 50, 20, 10, 5, 2];

    public function validatedBill(int $value): self
    {
        if (!in_array($value, $this->aceeptedBills)) {
            throw new \Exception('Nota inválida');
        }
        return $this;
    }
}
