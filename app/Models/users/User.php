<?php

namespace App\Models\users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'id';

      protected $table = "users";

      protected $guarded = [];

      public $timestamps = false;
  }
