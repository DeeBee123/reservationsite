<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Suite;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::orderBy('arrival')->get();
        return view('reservations.index', ['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = \App\Models\Hotel::orderBy('id')->get();
        $suites = \App\Models\Suite::orderBy('id')->get();


        return view('reservations.create', ['hotels' => $hotels, 'suites' => $suites]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this-> validate($request,
                [
                    'hotel_id'=> 'required',
                    'suite_id'=> 'required',
                    'arrival'=> 'required',
                    'departure'=> 'required',
                    'guests'=> 'required',
                    'price'=> 'required|max:10',
                ]
                );
        $reservation = new Reservation();
        $reservation->fill($request->all());
        $reservation->save();
        return redirect()->route('reservation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)

    {
        $hotels = \App\Models\Hotel::orderBy('id')->get();
        $suites = Suite::orderBy('id')->get();

        return view('reservations.edit', ['reservation' => $reservation, 'hotels' => $hotels, 'suites' => $suites]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $this-> validate($request,
        [
            'hotel_id'=> 'required',
            'suite_id'=> 'required',
            'arrival'=> 'required',
            'departure'=> 'required',
            'guests'=> 'required',
            'price'=> 'required|max:10',
        ]
        );
        $reservation->fill($request->all());
        $reservation->save();
        return redirect()->route('reservation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservation.index');
    }
}
