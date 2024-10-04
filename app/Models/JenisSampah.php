<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    protected $primaryKey = 'id_jenissampah';
    protected $table = 'jenis_sampah';
    protected $fillable = ['name'];
}
