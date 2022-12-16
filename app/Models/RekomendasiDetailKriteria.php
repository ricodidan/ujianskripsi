<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekomendasiDetailKriteria extends Model
{
    protected $fillable = [
        'id_rekomendasi_detail',
        'nama_kriteria',
        'nilai',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_rekomendasi_detail_kriteria';
    protected $table = 'rekomendasi_detail_kriteria';
    public $timestamps = false;
}
