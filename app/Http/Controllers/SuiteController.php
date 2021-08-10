<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Suite;
use Illuminate\Http\Request;

class SuiteController extends Controller
{  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $suites =Suite::orderBy('name')->get();
       return view('suites.index', ['suites' => $suites]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {

       return view('suites.create');
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
        'name'=> 'required|max:30'
    ]
    );
       $suite= new Suite();
       $suite-> fill($request->all());
       $suite->save();
       return redirect()-> route('suite.index');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Suite  $suite
    * @return \Illuminate\Http\Response
    */
   public function show(Suite $suite)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Suite  $suite
    * @return \Illuminate\Http\Response
    */
   public function edit(Suite $suite)
   {
       return view('suites.edit',['suite'=>$suite]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Suite  $suite
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Suite $suite)
   {
    $this-> validate($request,
    [
        'name'=> 'required|max:30'
    ]
    );
       $suite->fill($request->all());
       $suite->save();
       return redirect()-> route('suite.index');

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Suite  $suite
    * @return \Illuminate\Http\Response
    */
   public function destroy(Suite $suite)
   {
       $suite->delete();
       return redirect()->route('suite.index');
   }
}
