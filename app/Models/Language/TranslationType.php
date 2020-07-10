<?php

namespace App\Models\Language;

use Illuminate\Database\Eloquent\Model;

class TranslationType extends Model
{
    const TYPES = [
        'SINGLE_LINE' => 'SINGLE_LINE',
        'WYSIWYG' => 'WYSIWYG'
    ];
}
