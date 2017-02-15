@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Borang Permohonan</div>
                <div class="panel-body">

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open() !!}

  <div class="form-group">
    {!! Form::text('nama_pemohon', null, ['placeholder' => 'Isi nama anda...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::email('emel_pemohon', null, ['placeholder' => 'Isi emel anda...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::text('telefon_pemohon', null, ['placeholder' => 'Isi telefon anda...', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::select('kursus_id', ['1' => 'Kursus PHP 15 Mac 2017', '2' => 'Kursus Diving 20 Mac 2017'], null, ['placeholder' => 'Sila Pilih', 'class' => 'form-control']) !!}
  </div>

  <button class="btn btn-primary btn-block">Hantar Permohonan</button>

{!! Form::close() !!}

</div>
</div>
</div>
</div>
@endsection
