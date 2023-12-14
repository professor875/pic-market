<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $totalEarning = Purchase::query()
            ->whereIn('image_id', $request->user()->images->pluck('id')->toArray())
            ->sum('price');
        $totalImagesCount = $request->user()->images()->count();
        $totalPurchasesCount = $request->user()->purchases()->count();



        return view('dashboard', compact(['totalEarning', 'totalImagesCount', 'totalPurchasesCount']));
    }
}
