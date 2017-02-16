@extends('layouts/app')

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-12">

      <div class="panel">

        <div class="panel-body">

          <a href="{{ route('addEnrollment') }}" class="btn btn-primary">Tambah Enrollment</a>

  @if( count( $senarai_enrollments ) )

  <table class="table">

    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Telefon</th>
        <th>Alamat</th>
        <th>Bayaran (RM)</th>
        <th>Status</th>
        <th>Tindakan</th>
      </tr>
    </thead>

    <tbody>

    @foreach($senarai_enrollments as $item )

      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->emel }}</td>
        <td>{{ $item->telefon }}</td>
        <td>{{ $item->alamat }}</td>
        <td>{{ $item->jumlah_bayaran }}</td>
        <td>{{ ucwords( $item->status_bayaran ) }}</td>
        <td>{{ $item->gambar }}</td>
        <td>
          <a href="{{ route('editEnrollment', $item->id) }}" class="btn btn-xs btn-info">Edit</a>

          <!-- Button trigger modal -->
<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-modal-{{ $item->id }}">
  Delete
</button>

<!-- Modal -->
{!! Form::open(['method' => 'delete', 'route' => ['deleteEnrollment', $item->id ] ]) !!}

<div class="modal fade" id="delete-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pengesahan Hapus</h4>
      </div>
      <div class="modal-body">
        <p>Adakah anda bersetuju untuk menghapuskan permohonan:</p>

        <li>{{ $item->nama }}</li>

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

  {{ $senarai_enrollments->links() }}

  @endif

        </div><!-- class="panel-body"-->
      </div><!--  class="col-md-12" -->
    </div><!-- class="panel" -->
  </div><!--  class="row" -->
</div><!--  class="container" -->
@endsection
