<?php

use App\Models\Language\Language;
use App\Models\Language\Translation;
use App\Models\Language\TranslationGroup;
use App\Models\Language\TranslationType;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Creates the base entities for general purpose translations.
     *
     * @return void
     */
    public function run()
    {
        TranslationType::truncate();
        TranslationGroup::truncate();
        Language::truncate();
        Translation::truncate();

        $singleLineType = $this->createTypeByType(TranslationType::TYPES['SINGLE_LINE']);
        $wysiwygType = $this->createTypeByType(TranslationType::TYPES['WYSIWYG']);

        $generalGroup = $this->createGroupByKey(TranslationGroup::GROUPS['GENERAL']);
        $translationGroup = $this->createGroupByKey(TranslationGroup::GROUPS['TRANSLATION']);

        $defaultLanguage = $this->makeLanguage(Language::LOCALES['FI']);

        $this->translateGroup(
            $generalGroup,
            $singleLineType
        );

        $this->translateGroup(
            $translationGroup,
            $singleLineType
        );

        $this->translateTranslationType(
            $translationGroup,
            $singleLineType
        );

        $this->translateTranslationType(
            $translationGroup,
            $wysiwygType
        );

        $this->translateLanguage(
            $defaultLanguage, 
            $translationGroup, 
            $singleLineType
        );
    }

    public function createTypeByType ($type) : TranslationType {
        return TranslationType::create([ 'type' => $type ]);
    }

    public function createGroupByKey ($key) : TranslationGroup {
        return TranslationGroup::create([ 'key' => $key ]);
    }

    public function makeTranslation ($key, TranslationGroup $group, TranslationType $type) {
        return Translation::create([
            'key' => strtoupper($key),
            'group_id' => $group->id,
            'translation_type_id' => $type->id
        ]);
    }

    public function makeLanguage ($key) {
        return Language::create([ 'key' => $key ]);
    }

    public function translateGroup (TranslationGroup $group, TranslationType $type) {
        $translation = $this->makeTranslation($group->key, $group, $type);
        $group->update([ 'translation_id' => $translation->id ]);
    }

    public function translateTranslationType (TranslationGroup $group, TranslationType $type) {
        $translation = $this->makeTranslation($type->type, $group, $type);
        $type->update([ 'translation_id' => $translation->id ]);
    }

    public function translateLanguage (Language $lang, TranslationGroup $group, TranslationType $type) {
        $translation = $this->makeTranslation($lang->key, $group, $type);
        $lang->update([ 'translation_id' => $translation->id ]);
    }
}
