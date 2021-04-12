<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    public function index() {
        $timeslots = Timeslot::get();
        return inertia('Timeslots/Index', [
            'timeslots' => $timeslots,
        ]);
    }
}
