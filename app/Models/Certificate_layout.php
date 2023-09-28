<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate_layout extends Model
{
    use HasFactory;

    public $primaryKey = 'layout_id';
    // Timestamps
    public $timestamps = false;

    protected $fillable=['logo_1','logo_2','municipality','province','office','barangay','punongbarangay'];
}
