<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AffiliatesController extends Controller
{
    /**
     * Display a listing of affiliates.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function index(Request $request)
    {
        if ($request->get('distance_km')) {
            $distance_km = $request->get('distance_km');
            $affiliates = Affiliate::where('distance_km', '<=', $distance_km)
                ->orderBy('affiliate_id', 'asc')
                ->get();

        } else {
            $affiliates = Affiliate::all();
        }

        return view('affiliates.index', compact('affiliates'));
    }

    /**
     * Search for affiliates that live less than input km away.
     *
     * @param int $distance_km
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function searchAPI($distance_km=0)
    {
        $affiliates = Affiliate::where('distance_km', '<=', $distance_km)
            ->orderBy('affiliate_id', 'asc')
            ->get();

        return view('affiliates.index', compact('affiliates'));
    }
}
