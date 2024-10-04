<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiSampah extends Model
{
  protected $primaryKey = 'id_infosampah';
  protected $table = 'informasi_sampah';
  protected $dates = ['date_created'];

  protected $fillable = [
      'title',
      'description',
      'image_url',
      'id_user'
  ];

  public function user()
  {
      return $this->hasOne(User::class, 'id_user', 'id_user');
  }

}
