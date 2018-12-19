<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'synopsis', 'publish_year', 'id_type', 'id_author'];
}
