<?php

namespace App\Models\order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';

      protected $table = "orders";

      protected $guarded = [];

      public $timestamps = false;

      public function product()
      {
        return $this->belongsTo('App\Models\product\Product', 'product_id', 'id');
      }

      public function source()
      {
        return $this->belongsTo('App\Models\source_payment\Source', 'source_id', 'id');
      }
  }
