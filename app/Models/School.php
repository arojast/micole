<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'hs_id',
        'director_id',
        'mec_id',
        'country_id',
        'region_id',
        'city_id',
        'name',
        'postal',
        'phone',
        'email',
        'email2',
        'website',
        'fax',
        'addres',
        'addres_short',
        'latitude',
        'longitude',
        'plan_preference',
        'leads',
        'bussiness_status',
        'google_user_ratings_total',
        'google_rating',
        'revisor',
    ];

    protected $hidden = [
        'password',
    ];

    

    /**
     * return <array> plan preferences
     */
    public static function getPlanPreferences(){
        return [
            'Anual',
            'Semestral',
            'Trimestral',
            'Mensual'
        ];
    }

    /**
     * return <array> bussiness status
     */
    public static function bussinessStatus(){
        return [
            'OPERATIONAL',
            'CLOSED_PERMANENTLY',
        ];
    }
}

