@extends('layouts/app')

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-12">

      <div class="panel">

        <div class="panel-body">

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
          <a href="{{ url('member/' . $user->id . '/edit') }}" class="btn btn-xs btn-danger">Delete</a>
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
