<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brgy_official extends Model
{
    use HasFactory;
    protected $table = 'brgy_officials';
    //Primary Key
    public $primaryKey = 'official_id';
    // Timestamps
    public $timestamps = false;

    protected $fillable=['name','official_id','position','official_committe','year_of_service'];
}
