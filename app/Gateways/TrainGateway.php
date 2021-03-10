<?php


namespace App\Gateways;


class TrainGateway implements Transportation
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
            'type' => 'Train',
            'distance' => $distance,
            'time' => $distance / $this->velocity,
            'price' => 1000 + $this->classPrice,
        ];
    }
}
