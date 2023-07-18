<?php

namespace Tests;

use Src\Atm;
use PHPUnit\Framework\TestCase;

class AtmTest extends TestCase
{
    /** @test */
    public function it_should_be_able_add_bill()
    {
        $atm = new Atm();
        $atm->bill()->addBill(100);
        $this->assertTrue(in_array(100, $atm->bill()->getBill()));
        $this->assertEquals(1, count($atm->bill()->getBill()));
    }

    /** @test */
    public function it_should_be_able_add_multiple_bill()
    {
        $atm = new Atm();
        $atm->bill()->addBill(100)->addBill(50)->addBill(20);
        $this->assertTrue(in_array(100, $atm->bill()->getBill()));
        $this->assertEquals(3, count($atm->bill()->getBill()));
    }

    /** @test */
    public function it_should_be_able_add_multiple_bill_with_different_value()
    {
        $atm = new Atm();
        $atm->bill()->addBill(100)->addBill(50)->addBill(20);
        $this->assertTrue(in_array(100, $atm->bill()->getBill()));
        $this->assertTrue(in_array(50, $atm->bill()->getBill()));
        $this->assertTrue(in_array(20, $atm->bill()->getBill()));
        $this->assertEquals(3, count($atm->bill()->getBill()));
    }

    /** @test */
    public function validated_if_bill_is_valid()
    {
        $atm = new Atm();
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Nota inválida');
        $atm->bill()->addBill(90);
    }

    /** @test */
    public function validated_if_bill_is_already_added()
    {
        $atm = new Atm();
        $atm->bill()->addBill(100);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Nota já adicionada');
        $atm->bill()->addBill(100);
    }

    /** @test */
    public function it_should_be_able_withdraw()
    {
        $atm = new Atm();
        $atm->bill()->addBill(100)->addBill(50)->addBill(20);
        $result = $atm->withdraw()->ammount(170);
        $this->assertEquals(1, $result[100]);
        $this->assertEquals(1, $result[50]);
        $this->assertEquals(1, $result[20]);
    }

    /** @test */
    public function validated_if_value_withdraw_is_valid()
    {
        $atm = new Atm();
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Não é possível sacar este valor');
        $atm->bill()->addBill(100)->addBill(50)->addBill(20);
        $atm->withdraw()->ammount(1705);
    }

}
