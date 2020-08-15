<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Uniquevisitor extends Model
{
    protected $fillable=['ip','os','browser','device'];
}
