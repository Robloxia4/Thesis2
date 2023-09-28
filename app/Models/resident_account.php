<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resident_account extends Model
{
    use HasFactory;
    protected $table = 'resident_accounts';
    //Primary Key
    public $primaryKey = 'resident_account_id';
    // Timestamps
    public $timestamps = true;

    protected $guarded = [];


}
