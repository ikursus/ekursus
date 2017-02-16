@extends('layouts/app')

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-12">

      <div class="panel">

        <div class="panel-body">

          <p>
            <a href="{{ route('addKursus') }}" class="btn btn-primary">Tambah Kursus</a>
          </p>

  @if( count( $senarai_kursus ) )

  <table class="table">

    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Trainer</th>
        <th>Tarikh Kursus</th>
        <th>Masa Kursus</th>
        <th>Lokasi</th>
        <th>Harga</th>
        <th>Kuota</th>
        <th>Tindakan</th>
      </tr>
    </thead>

    <tbody>

    @foreach($senarai_kursus as $kursus)

      <tr>
        <td>{{ $kursus->id }}</td>
        <td>{{ $kursus->nama }}</td>
        <td>{{ $kursus->trainer }}</td>
        <td>
          <li>Mula: {{ $kursus->tarikh_mula }}</li>
          <li>Tamat: {{ $kursus->tarikh_tamat }}</li>
        </td>
        <td>
          <li>Mula: {{ $kursus->masa_mula }}</li>
          <li>Tamat: {{ $kursus->masa_tamat }}</li>
        </td>
        <td>{{ $kursus->lokasi }}</td>
        <td>{{ $kursus->harga }}</td>
        <td>{{ $kursus->kuota }}</td>
        <td>
          <a href="{{ route('showKursus', $kursus->id) }}" class="btn btn-xs btn-success">Peserta</a>
          <a href="{{ route('editKursus', $kursus->id) }}" class="btn btn-xs btn-info">Edit</a>

          <!-- Button trigger modal -->
<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-modal-{{ $kursus->id }}">
  Delete
</button>

<!-- Modal -->
{!! Form::open(['method' => 'delete', 'route' => ['deleteKursus', $kursus->id ] ]) !!}

<div class="modal fade" id="delete-modal-{{ $kursus->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pengesahan Hapus</h4>
      </div>
      <div class="modal-body">
        <p>Adakah anda bersetuju untuk menghapuskan akaun:</p>

        <li>{{ $kursus->nama }}</li>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Confirm</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

        </td>
      </tr>

    @endforeach

    </tbody>

  </table>

  {{ $senarai_kursus->links() }}


  @else

  <div class="alert alert-info">
    Tiada senarai kursus buat masa ini.
  </div>

  @endif

        </div><!-- class="panel-body"-->
      </div><!--  class="col-md-12" -->
    </div><!-- class="panel" -->
  </div><!--  class="row" -->
</div><!--  class="container" -->
@endsection
