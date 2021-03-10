<?php

namespace App\Gateways;

class PlaneGateway implements Transportation
{
    private $velocity;
    private $classPrice;

    public function __construct($velocity)
    {
        $this->velocity = $velocity; 
        $this->classPrice = 0;
    }

    public function countPrice($option)
    {
        $this->classPrice = $option;
    }

    public function transfer($distance){
        return [
            'type' => 'Plane',
            'distance' => $distance,
            'time' => $distance / $this->velocity,
            'price' => 5000 + $this->classPrice,
        ];
    }
}
