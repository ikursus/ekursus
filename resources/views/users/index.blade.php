@extends('layouts/app')

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-12">

      <div class="panel">

        <div class="panel-body">

          <a href="{{ route('addUser') }}" class="btn btn-primary">Tambah User</a>

  @if( count( $senarai_users ) )

  <table class="table">

    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Telefon</th>
        <th>Tindakan</th>
      </tr>
    </thead>

    <tbody>

    @foreach($senarai_users as $user)

      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->nama }}</td>
        <td>{{ ucwords( $user->status ) }}</td>
        <td>{{ $user->telefon }}</td>
        <td>
          <a href="{{ route('editUser', $user->id) }}" class="btn btn-xs btn-info">Edit</a>

          <!-- Button trigger modal -->
<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-modal-{{ $user->id }}">
  Delete
</button>

<!-- Modal -->
{!! Form::open(['method' => 'delete', 'route' => ['deleteUser', $user->id ] ]) !!}

<div class="modal fade" id="delete-modal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pengesahan Hapus</h4>
      </div>
      <div class="modal-body">
        <p>Adakah anda bersetuju untuk menghapuskan akaun:</p>

        <li>{{ $user->nama }}</li>

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

  {{ $senarai_users->links() }}

  @endif

        </div><!-- class="panel-body"-->
      </div><!--  class="col-md-12" -->
    </div><!-- class="panel" -->
  </div><!--  class="row" -->
</div><!--  class="container" -->
@endsection
