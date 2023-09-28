<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resident_info extends Model
{
    use HasFactory;
    protected $table = 'resident_infos';
    //Primary Key
    public $primaryKey = 'resident_id';
    // Timestamps
    protected $fillable=['lastname','firstname',
    'middlename',
    'alias',
    'birthday',
    'age',
    'gender',
    'civilstatus',
    'voterstatus',
    'birth_of_place',
    'citizenship',
    'telephone_no',
    'mobile_no',
    'height',
    'weight',
    'PAG_IBIG',
    'PHILHEALTH',
    'SSS',
    'TIN',
    'email',
    'spouse',
    'father',
    'mother',
    'area',
    'address_1',
    'address_2'];
    public $timestamps = true;
}
