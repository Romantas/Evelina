<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'mobile', 'email', 'date_of_birth', 'city', 'photo', 'education_date', 'education_place', 'science_area', 'degree', 'specialty', 'job_date', 'job_company', 'job_position', 'event_date', 'event_name', 'event_organizators', 'sertificate', 'languages', 'personal_qualities', 'hobby', 'driver_license',
    ];
}
