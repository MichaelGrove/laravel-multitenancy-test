<?php

namespace App\Models\Language;

use Illuminate\Database\Eloquent\Model;

class TranslationGroup extends Model
{
    const GROUPS = [
        'GENERAL' => 'GENERAL',
        'TRANSLATION' => 'TRANSLATION',
    ];
}
