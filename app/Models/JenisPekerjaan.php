<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pekerjaan';

    protected $guarded = [
        'id',
    ];
}
