<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrollment;
use App\Kursus;

class EnrollmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Dapatkan semua rekod permohonan kursus dan setkan
        // 10 senarai per page
        $senarai_enrollments = Enrollment::paginate(10);

        // Paparkan halaman senarai enrollements
        return view('enrollments/index', compact('senarai_enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Dapatkan dahulu senarai kursus yang ada untuk paparan pada selectbox
        // pluck('value', 'id')
        $kursus = Kursus::pluck('nama', 'id');

        // paparkan borang tambah permohonan
        return view('enrollments/create', compact('kursus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi borang
        $this->validate($request, [
          'nama' => 'required',
          'emel' => 'required|email',
          'telefon' => 'required',
          'alamat' => 'required',
          'jumlah_bayaran' => 'required|numeric',
          'kursus_id' => 'required|integer'
        ]);

        // Dapatkan semua data dari borang
        $data = $request->all();

        // semak jika wujud file gambar dimuat naik
        if ( $request->hasFile('gambar') )
        {
          // Upload gambar
          $request->file('gambar')->store('images');

          dd( $upload );

          // Dapatkan nama gambar
          $data['gambar'] = $request->file('gambar')->extension();
        }

        // Simpan rekod enrollment
        Enrollment::create($data);

        // Redirect ke halaman senarai enrollment
        return redirect()->route('indexEnrollments')->with('session_mesej_berjaya', 'Permohonan kursus telah berjaya ditambah!');


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
