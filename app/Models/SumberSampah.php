<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberSampah extends Model
{
    protected $primaryKey = 'id_sumbersampah';
    protected $table = 'sumber_sampah';
    protected $fillable = ['name'];
}
