<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate_list extends Model
{
    use HasFactory;

    public $primaryKey = 'certificate_list_id';
    // Timestamps
    public $timestamps = false;

    protected $fillable=['certificate_list_id','certificate_type','content_1','content_3','content_2','price','certificate_name'];

}
