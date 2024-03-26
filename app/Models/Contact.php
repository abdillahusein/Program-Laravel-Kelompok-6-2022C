<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * Mendefinisikan relasi dengan model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
