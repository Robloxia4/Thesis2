<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate_request extends Model
{
    use HasFactory;
    protected $table = 'certificate_requests';
    //Primary Key
    public $primaryKey = 'request_id';
    protected $fillable=['resident_id','name','description','age','gender','paid','price','account_id','request_type','cert_id'];

}
