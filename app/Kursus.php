<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    // Tetapan nama table untuk model Kursus
    protected $table = 'kursus';

    // Tetapan untuk mass assignment
    protected $fillable = [
      'nama',
      'trainer',
      'tarikh_mula',
      'tarikh_tamat',
      'masa_mula',
      'masa_tamat',
      'lokasi',
      'harga',
      'kuota',
    ];

    // Relationship diantara table kursus dan table enrollments
    public function senaraiPeserta()
    {
      return $this->hasMany('App\Enrollment', 'kursus_id', 'id');
    }
}
