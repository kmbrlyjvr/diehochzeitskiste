<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['user_id', 'title', 'checked'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
