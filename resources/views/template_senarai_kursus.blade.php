@extends('layouts/app')

@section('content')
{{-- // Ini adalah comment --}}
  <h1>Senarai Kursus 2017</h1>

  <table class="table">

    <thead>
      <tr>
        <th>ID</th>
        <th>Kursus</th>
        <th>Tarikh</th>
        <th>Tindakan</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>{{ $id }}</td>
        <td>{{ $nama_kursus }}</td>
        <td>{!! $tarikh_kursus !!}</td>
        <td>
          <a href="#">Daftar</a>
        </td>
      </tr>
    </tbody>

  </table>

@endsection
