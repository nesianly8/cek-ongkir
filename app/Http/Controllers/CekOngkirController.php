<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CekOngkirController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'key' => '777404a6bf87b04dc0a7cc99e9ac87c7',
        ])->get('https://api.rajaongkir.com/starter/city');
        $provinces = $response['rajaongkir']['results'];

        $responsecity = Http::withHeaders([
            'key' => '777404a6bf87b04dc0a7cc99e9ac87c7',
        ])->get('https://api.rajaongkir.com/starter/city');
        $cities = $responsecity['rajaongkir']['results'];

        // dd($provinces);
        return view('index', [
            'provinces' => $provinces,
            'cities' => $cities,
            'ongkir' => '',
        ]);
    }
    public function cekOngkir(Request $request)
    {
        $response = Http::withHeaders([
            'key' => '777404a6bf87b04dc0a7cc99e9ac87c7',
        ])->get('https://api.rajaongkir.com/starter/city');
        $provinces = $response['rajaongkir']['results'];

        $responseCost = Http::withHeaders([
            'key' => '777404a6bf87b04dc0a7cc99e9ac87c7',
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ]);
        
        $cities = $response['rajaongkir']['results'];
        $ongkir = $responseCost['rajaongkir']['results'];
        // dd($ongkir);
        return view('index', [
            'provinces' => $provinces,
            'cities' => $cities,
            'ongkir' => $ongkir,
        ]);
    }
    

}
