<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenaga extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $guarded = ['id'];

    public $timestamps = true;
}
