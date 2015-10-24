<?php

namespace ridbi\Http\Controllers;

use Illuminate\Http\Request;
use ridbi\Http\Requests;
use ridbi\Http\Controllers\Controller;
use ridbi\Rental;
use ridbi\Thing;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $requests = Rental::
                    join('things', 'rentals.thing_id', '=', 'things.id')
                    ->join('users', 'rentals.owner_user_id', '=', 'users.id')
                    ->where('rentals.renter_user_id', \Auth::user()->id)
                    ->where('rentals.status', 'pending')
                    ->select('*', 'things.name as thing_name')
                    ->get();
        
        $others_want = Rental::
                        join('things', 'rentals.thing_id', '=', 'things.id')
                        ->join('users', 'rentals.renter_user_id', '=', 'users.id')
                        ->where('rentals.owner_user_id', \Auth::user()->id)
                        ->where('rentals.status', 'pending')
                        ->select('*', 'rentals.id', 'things.name as thing_name')
                        ->get();

        $your_rentals = Rental::
                        join('things', 'rentals.thing_id', '=', 'things.id')
                        ->join('users', 'rentals.owner_user_id', '=', 'users.id')
                        ->where('rentals.renter_user_id', \Auth::user()->id)
                        ->where('rentals.status', 'confirmed')
                        ->select('*', 'things.name as thing_name')
                        ->get();

        $others_rentals = Rental::
                        join('things', 'rentals.thing_id', '=', 'things.id')
                        ->join('users', 'rentals.renter_user_id', '=', 'users.id')
                        ->where('rentals.owner_user_id', \Auth::user()->id)
                        ->where('rentals.status', 'confirmed')
                        ->select('*', 'rentals.id', 'things.name as thing_name')
                        ->get();



        return view('rentals.index', compact('requests', 'others_want', 'your_rentals', 'others_rentals'));

        
        //select * from things where id in $rentals->thing_id;
    }


    public function process($action, $id)
    {
        switch($action)
        {
            case 'confirm':
            $status = 'confirmed';
            break;

            case 'reject':
            $status = 'rejected';
            break;

            case 'returned':
            $status = 'returned';
            break;
        }

        $rental = Rental::findOrFail($id);
        $owner = $rental->owner_user_id;


        if (! $rental->owner_user_id = \Auth::user()) {
            return $this->unauthorized($request);
        } else {
            $rental->owner_user_id = $owner;
            $rental->status = $status;
            $rental->save();
        }

        return redirect('/rentals/');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
