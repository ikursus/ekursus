@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Borang Tambah Kursus</div>
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

{!! Form::open(['method' => 'post', 'route' => 'storeKursus']) !!}

  <div class="form-group">
    {!! Form::text('nama', null, ['placeholder' => 'Nama Kursus...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::select('trainer', $trainer, null, ['placeholder' => 'Sila Pilih Trainer', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::date('tarikh_mula', null, ['placeholder' => 'Tarikh Mula...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::date('tarikh_tamat', null, ['placeholder' => 'Tarikh Tamat...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::time('masa_mula', null, ['placeholder' => 'Masa Mula...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::time('masa_tamat', null, ['placeholder' => 'Masa Tamat...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::text('lokasi', null, ['placeholder' => 'Lokasi Kursus...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::text('harga', null, ['placeholder' => 'Harga Kursus...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::text('kuota', null, ['placeholder' => 'Kuota Tempat...', 'class' => 'form-control']) !!}
  </div>

  <button class="btn btn-primary btn-block">Simpan Maklumat</button>

{!! Form::close() !!}

</div>
</div>
</div>
</div>

@endsection
