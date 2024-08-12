<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusHubKeluarga extends Model
{
    use HasFactory;

    protected $table = 'status_hub_keluarga';

    protected $guarded = [
        'id'
    ];
}
