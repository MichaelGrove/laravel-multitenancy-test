<?php

namespace App\Models\Language;

use Illuminate\Database\Eloquent\Model;

class TranslationItem extends Model
{
    public function translation () {
        return $this->hasOne('App\Models\Language\Translation');
    }

    public function language () {
        return $this->hasOne('App\Models\Language\Language');
    }
}
