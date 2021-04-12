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
        return $this->belongsToMany(User::class);
    }
    public function groups() {
        return $this->belongsToMany(Group::class);
    }

    /*public function getDateofbirthAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }*/
}
