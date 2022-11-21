<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('orders.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        // user start and end date from last 30 days till date
        $from   = $request->start_date ?? Carbon::now()->subDays('30')->format("Y-m-d");
        $to     = $request->end_date ?? Carbon::now()->addDays('1')->format("Y-m-d");

        // default to last 30 days if nothing was provided.
        // $orders = Order::paginate(15)->withQueryString();
        if($request->has('distributor')){
            // TODO: add query for distributor
            $orders = Order::where('purchaser_id', $request->distributor)
            ->whereBetween('order_date', [$from, $to])
            ->paginate(15)
            ->withQueryString();
        }else{
            $orders = Order::whereBetween('order_date', [$from, $to])->paginate(15)->withQueryString();
        }

        // distributor
        $distributor_ids = DB::table('user_category')->where('category_id', 1)->get()->pluck('user_id');
        $distributors = User::whereIn('id', $distributor_ids)->get();

        return view('orders.report', compact('orders', 'from', 'to', 'distributors'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales(Request $request)
    {
        // customers
        $distributors = [];
        // $customer_ids = DB::table('user_category')->where('category_id', 2)->get()->pluck('user_id');
        // $customer = User::whereIn('id', $customer_ids)->get();

        // // get orders
        // $orders = Order::whereIn('purchaser_id', $customer_ids)->get();
        // $order_ids = [];
        // foreach ($orders as $key => $value) {
        //     # code...
        //     $referrer = $value->purchaser->referred_by;
        //     $user_category = DB::table('user_category')->where('user_id', $referrer)->first();
        //     if($user_category->category_id == 1){
        //         if(!in_array($value->id, $order_ids)){
        //             array_push($order_ids, $value->id);
        //         }
        //     }
        // }

        // $sales_orders = Order::whereIn('id', $order_ids)->get();
        // $sales_report = new Collection([]);
        // foreach ($sales_orders as $key => $value) {
        //     $referrer = $value->purchaser->referred_by;
        //     $data = (Object)[
        //         "name"      => User::where('id', $referrer)->first(),
        //         "amount"    => $value->amount
        //     ];

        //     $sales_report->push($data);
        // }

        return view('orders.sales', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function fetchByInvoice($key){
        $invoice = Order::where('invoice_number','Like',"%$key%")
        ->orWhere('purchaser_id','Like',"%$key%")
        ->first();
        return $invoice;
    }
    // public function fetchByInvoicek(Request $request){
    //     if($request->invoice_number){
    //         $invoice = Order::where('invoice_number','Like',"%$request->invoice_number%")
    //         // ->orWhere('purchaser_id','Like',"%$key%")
    //         ->first();
    //         return $invoice;
    //     }
    // }

    // public function fetchByDate(Request $request){
    //     $from = $request->from ?? Carbon::now()->subDays(30)->format("Y-m-d");
    //     $to = $request->to ?? Carbon::now()->addDays(1)->format("Y-m-d");
    //     // $from =Carbon::now()->format("Y-m-d");
    //     // $to =Carbon::now()->addDays(1)->format("Y-m-d");
    //     // $invoice = Order::whereBetween('order_date',[2020-04-15, 2020-04-24])->get();
    //     $invoice = Order::whereBetween('order_date', [$from, $to])->get();
    //     // $invoice = Order::whereBetween('order_date', [$from, $to])->get();
    //     return $invoice;
    // }
}
