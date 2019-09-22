<?php

namespace Agpretto\Articles\Tests\Fixtures;

use Illuminate\Foundation\Auth\User as Model;
use Agpretto\Articles\Traits\HasArticles;

class User extends Model
{
    use HasArticles;
}
