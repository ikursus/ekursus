@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Borang Permohonan</div>
                <div class="panel-body">

<form method="POST">
  
{{ csrf_field() }}

  <div class="form-group">
    <input type="text" name="nama_pemohon" placeholder="Isi nama anda..." class="form-control">
  </div>

  <div class="form-group">
    <input type="text" name="emel_pemohon" placeholder="Isi emel anda..." class="form-control">
  </div>

  <div class="form-group">
    <input type="text" name="telefon_pemohon" placeholder="Isi telefon anda..." class="form-control">
  </div>

  <div class="form-group">
    <select name="kursus_id" class="form-control">
      <option value="1">Kursus PHP 15 Mac 2017</option>
      <option value="2">Kursus Diving 20 Mac 2017</option>
    </select>
  </div>

  <button class="btn btn-primary btn-block">Hantar Permohonan</button>

</form>

</div>
</div>
</div>
</div>
@endsection
