<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;
use DB;

class Order extends Model
{
    use HasFactory;


    protected $appends = ['purchaser', 'amount'];

    /**
    *
    * GET PURCHASER
    * @param
    *
    */
    public function getPurchaserAttribute(){
    	// body
    	return User::where('id', $this->purchaser_id)->first();
    }

    /**
    *
    * GET PURCHASER
    * @param
    *
    */
    public function getAmountAttribute(){
    	// body
    	$order_items = OrderItem::where('order_id', $this->id)->get();
    	$total_amount = 0;
    	foreach ($order_items as $key => $value) {
    		$total_amount = $total_amount + $value->qantity * $value->product->price ?? 0;
    	}
    	return $total_amount;
    }


    /**
    *
    * total distributor
    * @param
    *
    */
    public function getTotalDistributor($distributor_id){
    	// body
    	if($distributor_id == null){
    		return 0;
    	}

    	$total_referred_distributor_ids = User::where('referred_by', $distributor_id)->pluck('id');
    	$total_referred_distributor = DB::table('user_category')
    	->whereIn('user_id', $total_referred_distributor_ids)
    	->where('category_id', 1)
    	->count();

    	return $total_referred_distributor;
    }

    /**
    *
    * get commission order
    * @param
    *
    */
    public function getTotalCommission($referred_count){
    	// body
        switch (true) {
            case $referred_count <= 5:
                $data = 5;
                break;

            case $referred_count <= 10:
                $data = 10;
                break;

            case $referred_count <= 20:
                $data = 15;
                break;

            case $referred_count <= 30:
                $data = 20;
                break;

            case $referred_count >= 30:
                $data = 30;
                break;
            
            default:
                # code...
                $data = 5;
                break;
        }

        return $data;
    }
}
