<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    protected $primaryKey = 'id_sampah';
    protected $table = 'sampah';
    protected $dates = [
      'date_created',
      'date_updated',
      'date_deleted',
      'date_pickup'
    ];

    protected $fillable = [
        'name',
        'description',
        'berat_sampah',
        'id_user'
    ];

    public function jenis_sampah()
    {
        return $this->hasOne(JenisSampah::class, 'id_jenissampah', 'id_jenissampah');
    }

    public function sumber_sampah()
    {
        return $this->hasOne(SumberSampah::class, 'id_sumbersampah', 'id_sumbersampah');
    }

    public function status_sampah()
    {
        return $this->hasOne(StatusSampah::class, 'id_statussampah', 'id_statussampah');
    }
}
