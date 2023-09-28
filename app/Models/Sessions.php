<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    use HasFactory;
    protected $table = "sessions";
    protected $fillable = ['sessioon_id','user_id','username','login_at'];
    public $primaryKey = 'session_id';

    public $timestamps = false;

}
