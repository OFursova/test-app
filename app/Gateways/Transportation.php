<?php


namespace App\Gateways;


interface Transportation
{
    public function countPrice($option);
    public function transfer($distance);
}
