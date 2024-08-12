<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubKepalaKeluarga extends Model
{
    use HasFactory;

    protected $table = 'hub_kepala_keluarga';

    protected $guarded = [
        'id',
    ];
}
