<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use \Illuminate\Contracts\View\View;

class FilesController extends Controller
{
    /**
     * Show the form for selecting a new resource.
     *
     * @return View
     */
    public function read()
    {
        return view('files.read');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreFileRequest $request)
    {
        // Home office coordinates
        $latitudeHome = 53.3340285;
        $longitudeHome = -6.2535495;


        // Load file
        $file = fopen($request->file, "r");
        while(! feof($file))
        {
            $data = json_decode(fgets($file), true);

            $latitude1 = deg2rad($latitudeHome);
            $latitude2 = deg2rad($data['latitude']);
            $longitude1 = deg2rad($longitudeHome);
            $longitude2 = deg2rad($data['longitude']);

            $data['distance'] = rad2deg(
                    acos(
                        sin($latitude1) * sin($latitude2) +
                        cos($latitude1) * cos($latitude2) * cos(abs($longitude1 - $longitude2))
                    )
                ) * 60 * 1.1515 * 1.609344;
            $data['distance'] = number_format((float)$data['distance'], 2, '.', '');

            try{
                $affiliate = new Affiliate;
                $affiliate->affiliate_id = $data['affiliate_id'];
                $affiliate->name = $data['name'];
                $affiliate->latitude = $data['latitude'];
                $affiliate->longitude = $data['longitude'];
                $affiliate->distance_km = $data['distance'];
                $affiliate->save();
            }
            catch(Exception $e){
                return redirect('affiliates')->with('failed',"operation failed");
            }
        }

        // Close file since we don't need to check it anymore.
        fclose($file);

        return redirect()->route('affiliates.index')->with('status',"Insert successfully");
    }
}
