<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratmasuk extends Model
{
    protected $table = 'suratmasuk';
    protected $fillable = ['no_surat', 'kode', 'filemasuk', 'isi'];
}