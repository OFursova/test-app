<?php

namespace App\Http\Controllers;

use App\Gateways\Transportation;
use App\Journey\JourneyDetails;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function transfer(JourneyDetails $journeyDetails, Transportation $transport){
        $trip = $journeyDetails->business();
        $transport = $transport->transfer(1200);
        // dd($transport->transfer(1200));
        return view('welcome', compact('transport'));
    }

}
