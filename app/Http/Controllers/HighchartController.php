<?php

namespace App\Http\Controllers;
use App\expenses;
use Illuminate\Http\Request;

class HighchartController extends Controller
{
    public function handleChart()
    {
        $userData = expenses::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('entry_date', date('Y'))
                    ->groupBy(\DB::raw("Month(amount)"))
                    ->pluck('count');
          
        return view('home', compact('userData'));
    }
}
