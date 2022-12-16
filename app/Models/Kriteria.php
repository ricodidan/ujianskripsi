<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_kriteria';
    protected $table = 'kriteria';

    public static function getKriteriaByName($name){
        return Kriteria::where('nama', $name)->first();
    }
}
