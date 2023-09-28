<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    //Primary Key
    public $primaryKey = 'account_id';
    // Timestamps
    public $timestamps = true;
}
