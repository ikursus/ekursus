<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kursus;
use App\User;
use DB;

class KursusController extends Controller
{
    // Papar borang permohonan kursus
    public function paparBorangPermohonan()
    {
      return view('template_borang_permohonan_kursus');
    }

    public function prosesBorangPermohonan(Request $request)
    {
      // $this->validate( $request, $array );
      $this->validate( $request, [
        'nama_pemohon' => 'required|min:3',
        'emel_pemohon' => 'required|email|min:3',
        'kursus_id' => 'required|integer'
      ] );

      $data = $request->all();
      // return $data;

      // Save ke database

      // Response
      return redirect('/kursus/permohonan')
      ->with('session_mesej_berjaya', $data['nama_pemohon'] . ' Permohonan berjaya dikirimkan!');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Dapatkan senarai kursus
        $senarai_kursus = Kursus::paginate(5);

        // Paparkan template senarai kursus dan attach variable $senarai_kursus
        return view('kursus/index', compact('senarai_kursus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Dapatkan user yang mempunyai status trainer
        // Dan dapatkan rekod bagi column nama dan ID
        // menggunakan fungsi pluck()
        $trainer = User::where('status', '=', 'trainer')
        ->pluck('nama', 'nama');
        // pluck ('paparan pada select box', 'value pada select box');

        // Paparkan borang create kursus, dan attach data trainer
        return view('kursus/create', compact('trainer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi borang
        $this->validate( $request, array(
          'nama' => 'required|min:3',
        ) );

        // Dapatkan semua data dari borang
        $data = $request->all();

        // Simpan data ke dalam database
        Kursus::create($data);

        // Kembali ke halaman senarai kursus
        return redirect()->route('indexKursus')->with('session_mesej_berjaya', 'Senarai kursus telah ditambaha');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Kaedah relationship query builder (DB)
        // $kursus = DB::table('kursus')
        // ->join('enrollments', 'kursus.id', '=', 'enrollments.kursus_id')
        // ->where('kursus.id', '=', $id)
        // ->select('enrollments.id', 'enrollments.nama', 'enrollments.emel', 'enrollments.alamat', 'kursus.nama as kursus_nama')
        // ->get();
        // Dapatkan maklumat kursus
        $kursus = Kursus::find($id);

        // Senarai peserta
        // $peserta = Enrollment::where('kursus_id', '=', $kursus->id)
        // ->get();

        return view('kursus/senarai_peserta', compact('kursus') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Panggil data kursus berdasarkan ID
        $kursus = Kursus::find($id);

        // Panggil data trainer untuk select box kursus
        $trainer = User::where('status', '=', 'trainer')
        ->pluck('nama', 'nama');

        // Paparkan borang edit kursus
        return view('kursus/edit', compact('kursus', 'trainer') );
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
      // validasi borang
      $this->validate( $request, array(
        'nama' => 'required|min:3',
      ) );

      // Dapatkan semua data dari borang
      $data = $request->all();

      // Simpan data ke dalam database berdasarkan ID
      Kursus::find($id)->update($data);

      // Kembali ke halaman senarai kursus
      return redirect()->back()->with('session_mesej_berjaya', 'Senarai kursus telah dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kursus::find($id)->delete();

        return redirect()->route('indexKursus')->with('session_mesej_berjaya', 'Kursus berjaya dihapuskan!');
    }
}
