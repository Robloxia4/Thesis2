<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangayimage extends Model
{
    use HasFactory;
    public $primaryKey = 'barangay_id';

    protected $fillable = ['barangay_name','barangay_id','image','province','city','url'];
}
