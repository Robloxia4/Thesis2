<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class person_involve extends Model
{
    use HasFactory;
    protected $table = 'person_involves';
    //Primary Key
    public $primaryKey = 'person_id';
    // Timestamps
    protected $fillable = [
        'blotter_id',
        'resident_id',
        'person_involve',
        'involvement_type'
    ];
    public $timestamps = true;
}
