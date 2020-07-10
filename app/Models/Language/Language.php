<?php

namespace App\Models\Language;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    const LOCALES = [
        'FI' => 'fi',
        'EN' => 'en',
        'SE' => 'se'
    ];

    public static function localeIsValid ($locale) : bool {
        return (new static())->where(['key' => $locale])->get()->first() ? true : false;
    }
}
