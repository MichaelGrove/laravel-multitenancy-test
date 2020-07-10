<?php

namespace App\Models\Language;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public function type () {
        return $this->hasOne('App\Models\Language\TranslationType', 'translation_type_id');
    }

    public function group () {
        return $this->hasOne('App\Models\Language\TranslationGroup');
    }

    public function translationItems () {
        return $this->hasMany('App\Model\Language\TranslationItem');
    }
}
