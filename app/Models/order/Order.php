<?php

namespace App\Models\order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';

      protected $table = "order";

      protected $guarded = [];

      public $timestamps = false;

      // public function category()
      // {
      //   return $this->belongsTo('App\Models\category\Category', 'category_id', 'id');
      // }

      // public function supplier()
      // {
      //   return $this->belongsTo('App\Models\supplier\Supplier', 'supplier_id', 'id');
      // }
  }
