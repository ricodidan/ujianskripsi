<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kriteria;
use App\Models\Balita;

class KriteriaBalita extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nilai',
        'id_balita',
        'id_kriteria',
    ];

    public function kriteria()
    {
        return $this->hasOne(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }

    public function balita()
    {
        return $this->hasOne(Balita::class, 'foreign_key', 'id_balita');
    }

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_kriteria_balita';
    protected $table = 'kriteria_balita';
    public $timestamps = false;
}
