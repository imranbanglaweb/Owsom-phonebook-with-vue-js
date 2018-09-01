<?php

namespace App\Http\Controllers;

use App\Phonebook;
use Illuminate\Http\Request;
use App\Http\Requests\Phonebookrequest;
use DB;
class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phonebook = DB::table('phonebooks')->get();

        return view('phonebook')->with('phonebook',$phonebook);
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
    public function store(Phonebookrequest $request)
    {

      $pb = new Phonebook;
      $pb->name = $request->name;
      $pb->phone = $request->phone;
      $pb->email = $request->email;
      $pb->save();
      return $pb;

     //  $data = array();
     //  $data['name'] =$request->name;
     //  $data['phone'] =$request->phone;
     //  $data['email'] =$request->email;
    
     // DB::table('phonebooks')->insert($data);


    }

    public function GetData(){

            return Phonebook::orderBy('name','asc')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(Phonebookrequest $request)
    {
              $pb = Phonebook::find($request->id);
              $pb->name = $request->name;
              $pb->phone = $request->phone;
              $pb->email = $request->email;
              $pb->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
        Phonebook::where('id',$phonebook->id)->delete();
    }
}
