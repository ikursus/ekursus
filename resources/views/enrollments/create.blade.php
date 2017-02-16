@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Borang Tambah Enrollments</div>
                <div class="panel-body">

@if ( count( session('session_mesej_berjaya') ) )
<div class="alert alert-success">
    <ul>
        {{ session('session_mesej_berjaya') }}
    </ul>
</div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['method' => 'post', 'route' => 'storeEnrollment']) !!}

  <div class="form-group">
    {!! Form::select('kursus_id', $kursus, null, ['placeholder' => 'Sila Pilih Kursus', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::text('nama', null, ['placeholder' => 'Nama...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::email('emel', null, ['placeholder' => 'Emel...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::text('telefon', null, ['placeholder' => 'Telefon...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::textarea('alamat', null, ['placeholder' => 'Alamat...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::text('jumlah_bayaran', null, ['placeholder' => 'Jumlah Bayaran...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('gambar', 'Gambar Bukti Bayaran') !!}
    {!! Form::file('gambar') !!}
  </div>

  <button class="btn btn-primary btn-block">Simpan Maklumat</button>

{!! Form::close() !!}

</div>
</div>
</div>
</div>

@endsection
