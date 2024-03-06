<?php
namespace App\Services;


use Symfony\Component\Intl\Countries;

class Country{
    public static function countryCode ($countryCode){
    
        return Countries::getName($countryCode,config('app.locale'));

    }
}