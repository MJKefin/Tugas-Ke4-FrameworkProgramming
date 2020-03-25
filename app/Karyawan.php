<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','alamat','jabatan','no_hp'];
}
