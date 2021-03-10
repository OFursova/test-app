<?php

namespace App\Journey;

use App\Gateways\Transportation;

class JourneyDetails
{
    private $transportGateway;

    public function __construct(Transportation $transportGateway)
    {
        $this->transportGateway = $transportGateway; 
    }

    public function business(){

        $this->transportGateway->countPrice(500);
       
        return [
            'operator' => 'Coral Travel',
            'insurance' => 'included'
        ];
    }

    public function standard(){

        $this->transportGateway->countPrice(200);
        
        return [
            'operator' => 'Coral Travel',
            'insurance' => 'partial'
        ];
    }
}