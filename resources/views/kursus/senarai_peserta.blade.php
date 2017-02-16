@extends('layouts/app')

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-12">

      <div class="panel">

        <div class="panel-body">

          Berikut adalah merupakan peserta bagi kursus {{ $kursus->nama }}


  @if( count( $kursus->senaraiPeserta ) )

  <table class="table">

    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Peserta</th>
        <th>Emel Peserta</th>
        <th>Alamat Peserta</th>
      </tr>
    </thead>

    <tbody>

    @foreach( $kursus->senaraiPeserta as $peserta )

      <tr>
        <td>{{ $peserta->nama }}</td>
        <td>{{ $peserta->emel }}</td>
        <td>{{ $peserta->alamat }}</td>
      </tr>

    @endforeach

    </tbody>

  </table>


  @else

  <div class="alert alert-info">
    Tiada senarai peserta kursus buat masa ini.
  </div>

  @endif

        </div><!-- class="panel-body"-->
      </div><!--  class="col-md-12" -->
    </div><!-- class="panel" -->
  </div><!--  class="row" -->
</div><!--  class="container" -->
@endsection
