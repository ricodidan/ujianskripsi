<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\KriteriaBalita;

class Balita extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'alamat',
        'nama_ibu',
        'nama_ayah',
        'jenis_kelamin',
        'tanggal_lahir',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_balita';
    protected $table = 'balita';

    protected $dates = [
        'tanggal_lahir',
    ];

    public function kriteria()
    {
        return $this->hasMany(KriteriaBalita::class, 'foreign_key', 'id_kriteria_balita');
    }

    public static function getNilaiKriteria($idBalita, $idKriteria)
    {
        return KriteriaBalita::where(['id_balita' => $idBalita, 'id_kriteria' => $idKriteria])->first();
    }
}
