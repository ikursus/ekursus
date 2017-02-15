<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function homepage()
    {
        return view('welcome');
    }

    public function list_kursus() {

      // $array = [
      //   'id' => 1,
      //   'nama_kursus' => 'Kursus Diving di Perak',
      //   'tarikh_kursus' '1 Mac 2017'
      // ];

      $id = '<strong>1</strong>';
      $nama_kursus = 'Kursus Diving di Perak';
      $tarikh_kursus = '1 Mac 2017';

      $img = 'http://lorempixel.com/400/200/sports/';

      return view('template_senarai_kursus', compact(
        'id',
        'nama_kursus',
        'tarikh_kursus',
        'img'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
