<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendukung extends Model
{
    use HasFactory;

    protected $table = 'data_pendukung';

    protected $guarded = [
        'id'
    ];
}
