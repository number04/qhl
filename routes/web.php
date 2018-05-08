<?php

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

use App\Models\Franchise;
use App\Models\Player;
use App\Models\Schedule;
use App\Models\Bye;
use App\Models\Date;
use App\Repositories\GlobalRepository;


Route::get('/', function () {
    return view('landing');
});

Route::get('/franchise-{id}', function ($id) {
    return view('franchise', ['id' => $id]);
});

Route::get('/schedule', function () {
    return view('schedule');
});


Route::get('data/main', function (GlobalRepository $global) {

    return response([
        'data' => [
            'performance' => Player::with([
                'member',
            ])->where('performance', '=', $global->date() - 1)->first()->member->full_name,

            'dates' => Date::where('id', '=', $global->date())->get(),

            'byes' => Bye::with('franchise')
                ->where('id', '=', $global->date())
                ->get(),

            'games' => Schedule::with([
                'time',
                'home',
                'visitor'
            ])->where('date_id', '=', $global->date())->get(),

            'franchises' => Franchise::with([
                'standing',
            ])->get(),

            'statistics' => Player::with([
                'member',
                'franchise'
            ])->where('franchise_id', '!=', 0)->get()
        ]
    ]);
});

Route::get('data/schedule', function () {

    return response([
        'data' => [
            'league_by' => [
                'month' => 'Aug',
                'day' => '13'
            ],

            'dates' => Date::get(),

            'games' => Schedule::with([
                'time',
                'home',
                'visitor'
            ])->get(),

            'byes' => Bye::with([
                'franchise'
            ])->get(),

            
        ]
    ]);
});