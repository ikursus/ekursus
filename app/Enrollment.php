<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    // Tetapan nama table untuk model Kursus
    protected $table = 'enrollments';

    // Tetapan mass assignement
    protected $fillable = [
      'nama',
      'emel',
      'telefon',
      'alamat',
      'gambar',
      'jumlah_bayaran',
      'status_bayaran',
      'kursus_id'
    ];
}
