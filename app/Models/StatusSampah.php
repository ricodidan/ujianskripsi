<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusSampah extends Model
{
    protected $primaryKey = 'id_statussampah';
    protected $table = 'status_sampah';
    protected $fillable = ['name'];
}
