<?php

namespace App\Models\Translations;

use A17\Twill\Models\Model;
use App\Models\Author;

class AuthorTranslation extends Model
{
    protected $baseModuleModel = Author::class;
}
