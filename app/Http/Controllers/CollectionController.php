<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CollectionController extends Controller
{
    public function index()
    {   
        // ********** Cache Facade **********

        // Cache::put('name', 'akshay', $seconds = 5);
        //  Cache::put('roll',100);
        // cache::put('state', 'jarkhand', now()->addMinute(1));
        //     Cache::remember('state', 1 , function () {
        //         return 'bihar';
        //    });
        // dd(Cache::add('roll', 110 , 1));
        // dd(Cache::add('money', 110 ,1));
        // Cache::forever('product','laptop');
        // dd(Cache::get('product'));

        // Retrieving Item
        // $product = Cache::get('product');
        // $quentity = Cache::get('quentity',12);
        // $cart = Cache::get('cart', function(){
        //     return 2; 
        // });
        // $data = ['product'=>$product, 'quentity'=>$quentity, 'cart'=>$cart];
        // return view('cache',$data);

        // Item Exists in cache
        // if(Cache::has('product')){
        //     dd("Yes");
        // }

        // Removing Items
        // Cache::forget('product');
        // dd(Cache::get('product'));

        // Clear Cache
        // Cache::flush();

        // Retrieving and Store Item
        // $value = Cache::rememberForever('shirt', function () {
        //     return 10;
        // }); 
        // dd($value);

        // Retrieving and Delete Item
        // $value = Cache::pull('product');
        // dd($value);

        // ********** Global Cache Helper **********

        // Cache(['name'=>'akshay'],2); 
        // Cache(['roll'=>101]);
        // Cache(['state'=>'jarkhand'], now()->addMinutes(5));
        // Cache()->remember('state', 5, function(){
        //   return 'Bihar';
        //  });
        // dd(Cache()->add('roll',100,5));
        // Cache()->forever('product','Laptop');
        // dd(Cache('product'));

        // Retrieving Item
        // $product = Cache('product');
        // $quentity = Cache('quentity',12);
        // $cart = Cache('cart', function(){
        //     return 2; 
        // });
        // $data = ['product'=>$product, 'quentity'=>$quentity, 'cart'=>$cart];
        // return view('cache',$data);

        // Item Exists in cache
        // if(Cache()->has('product')){
        //     dd("Yes");
        // }

        // Removing Items
        // Cache()->forget('product');
        // Cache()->put('product','Laptop', 0);
        // dd(Cache::get('product'));

        // Clear Cache
        // Cache()->flush();

        // Retrieving and Store Item
        // $value = Cache()->rememberForever('shirt', function () {
        //     return 10;
        // }); 
        // dd($value);

        // Retrieving and Delete Item
        // $value = Cache()->pull('product');
        // dd($value);

    }
}
