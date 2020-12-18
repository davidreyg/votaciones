<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectionGroup extends Model
{
    protected $fillable = ['group_id', 'election_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}
