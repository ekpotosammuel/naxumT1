<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $appends = ['product'];

    /**
    *
    * product
    * @param
    *
    */
    public function getProductAttribute(){
    	// body
    	$product = Product::where('id', $this->product_id)->first();
    	return $product;
    }
}
