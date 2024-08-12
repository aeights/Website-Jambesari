<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;
    protected $primaryKey = 'nomor';

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $table = 'kartu_keluarga';

    protected $fillable = [
        'nomor',
        'kepala_keluarga'
    ];
}
