<?php

use Src\Atm;

require 'vendor/autoload.php';


$atm = new Atm();
$atm->bill()->addBill(100)->addBill(50)->addBill(5)->addBill(2);

$result = null;

try {
    $result = $atm->withdraw()->ammount(879);
} catch (\Exception $exception) {
    exit($exception);
}

foreach ($result as $bill => $quantity) {
    echo $quantity . ' notas de ' . $bill . '<br/>';
}
