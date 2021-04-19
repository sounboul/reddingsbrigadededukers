<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'firstname',
        'tussenvoegsel',
        'lastname',
        'username',
        'email',
        'dateofbirth',

    ];

    public function users() {
        return $this->belongsToMany(User::class)->withPivot('is_confirmed')->wherePivot('is_confirmed', 1);
    }
    public function requestedUsers() {
        return $this->BelongsToMany(User::class)->withPivot('is_confirmed')->wherePivot('is_confirmed', 0);
    }

    public function groups() {
        return $this->belongsToMany(Group::class);
    }

    public function isInGroup(Group $group) {
        return $this->groups->where('id', $group->id)->count() > 0;
    }

    /*public function getDateofbirthAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }*/
}
