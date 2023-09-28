<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blotters extends Model
{
    use HasFactory;
    protected $table = 'blotters';
    //Primary Key
    public $primaryKey = 'blotter_id';
    // Timestamps
    protected $fillable = [
        'incident_location',
        'incident_type',
        'date_incident',
        'time_incident',
        'date_reported',
        'time_reported',
        'status',
        'schedule_date',
        // 'schedule_time',
        'schedule',
        'incident_narrative'
    ];
    public $timestamps = true;
}
