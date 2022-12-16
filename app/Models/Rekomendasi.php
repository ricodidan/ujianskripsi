<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RekomendasiDetail;
use App\Models\User;

class Rekomendasi extends Model
{
    protected $fillable = [
        'id_user',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_rekomendasi';
    protected $table = 'rekomendasi';

    public function rekomendasiDetail()
    {
        return $this->hasMany(RekomendasiDetail::class, 'id_rekomendasi', 'id_rekomendasi_detail');
    }
    
    public function user()
    {
        return $this->hasOne(User::class, 'id_user');
    }
}
