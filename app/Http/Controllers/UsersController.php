<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Berhubung dengan table users
        // Dapatkan SEMUA rekod
        $senarai_users = DB::table('users')
        // ->where('status', '=', 'user')
        ->orderBy('id', 'desc')
        ->paginate(3);
        // Paparkan template index dalam folder users
        // Attach variable users
        return view('users/index', compact('senarai_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data yang dikirimkan dari borang
        $this->validate($request, [
          'username' => 'required|min:3|unique:users,username',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|min:3'
        ]);

        // Contoh cara terima data dari borang
        // $data = $request->all(); // Terima semua data
        // $data = $request->input('username'); // Terima 1 data yang spesifik
        // $data = $request->only(['username', 'email']) // Terima data tertentu saja

        // Terima SEMUA data dari borang KECUALI password
        // $data = $request->except('password');
        $data = $request->only('username', 'nama', 'email', 'status', 'telefon');

        // Kemudian dapatkan pula data password dari borang
        // dan encrypt password menggunakan function bcrypt()
        $data['password'] = bcrypt( $request->input('password') );

        // Simpan array data dari borang ke database table users
        // \App\User::create($data);
        DB::table('users')->insert($data);

        // Setelah data selesai di simpan, redirect ke halaman senarai users
        return redirect('member');
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
        $user = DB::table('users')
        ->where('id', '=', $id)
        //->where('id', $id)
        ->first();

        return view('users/edit', compact('user') );
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
      // Validate data yang dikirimkan dari borang
      $this->validate($request, [
        'username' => 'required|min:3|unique:users,username,' . $id,
        'email' => 'required|email|unique:users,email,' . $id
      ]);

      // Dapatkan data yang ingin dikemaskini dari borang
      // Terima SEMUA data dari borang KECUALI password
      // $data = $request->except('password');
      $data = $request->only('username', 'nama', 'email', 'status', 'telefon');

      //  Semak adakah ruangan password kosong ataupun tidak
      // Jika tidak kosong, bererti perlu update password
      // Dapatkan data password dari borang
      // dan encrypt password menggunakan function bcrypt()
      if ( ! is_null( $request->input('password') ) AND ! empty( $request->input('password') ))
      {
        $data['password'] = bcrypt( $request->input('password') );
      }
      // Panggil rekod user yang ingin dikemaskini
      // Kemudian update / kemaskini rekod profile
      $user = DB::table('users')
      ->where('id', '=', $id)
      //->where('id', $id)
      ->update( $data );

      // Kembali ke halaman edit
      return redirect()->back()->with('session_mesej_berjaya', 'Profile ID ' . $id . ' telah dikemaskini.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')
        ->where('id', $id)
        ->delete();

        return redirect('member')->with('session_mesej_berjaya', 'Profile ID ' . $id . ' telah dihapuskan.');

    }
}
