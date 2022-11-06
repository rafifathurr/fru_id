<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $primaryKey = 'id';
  
      protected $table = "source_payment";
  
      protected $guarded = [];
  }
