<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Deal extends Model
{
    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function active(): HasOne
    {
        return $this->hasOne(Active::class, 'id', 'active_id');
    }


}
