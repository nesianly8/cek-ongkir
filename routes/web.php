<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\CekOngkirController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/city', function () {

    $response = Http::withHeaders([
        'key' => '777404a6bf87b04dc0a7cc99e9ac87c7',
    ])->get('https://api.rajaongkir.com/starter/city');

    dd($response->json()['rajaongkir']['results']);

});

Route::get('/province', function () {

    $response = Http::withHeaders([
        'key' => '777404a6bf87b04dc0a7cc99e9ac87c7',
    ])->get('https://api.rajaongkir.com/starter/province');

    // $statusCode = $response->json()['rajaongkir']['status']['code'];
    // $province = $response->json()['rajaongkir']['results'];

    dd($response->json());
    // dd($province);

});

// Route::get('/cekongkir', [CekOngkirController::class, 'index']);
Route::get('/cek-ongkir', [CekOngkirController::class, 'index'])->name('index');
Route::post('/cek-ongkir', [CekOngkirController::class, 'cekOngkir'])->name('cekOngkir');