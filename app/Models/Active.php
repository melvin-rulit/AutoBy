<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    protected $casts = [
        'document_date' => 'date'
    ];

}
