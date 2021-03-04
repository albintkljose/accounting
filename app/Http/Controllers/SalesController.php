<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use App\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Sale::all();
        $balance = Sale::sum('amount');
        $datas=[
            "totalAmount" => $balance,
            "products" => $products
        ];
       // return view('products.index')->with('products', $products); 
       return view('products.index',$datas); 
       /* $products = Sale::latest()->paginate(5);
  
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            */
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sType' => 'required',
        ]);
        $user= new Sale();
        $user->sType= $request['sType'];
        $user->amount= $request['amount'];
        $user->notes= $request['notes'];
        $user->date= $request['date'];
        $user->save();
        // Sale::create($request->all());
   
         return redirect()->route('sales.index')
                         ->with('success','Product created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$post= \DB::table('sales')->where('id',$product)->first();
        $post=Sale::find($id);
        return view('products.show',["post"=>$post]);
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Sale::find($id);
        return view('products.edit',["post"=>$post]);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Sale::find($id);
        $post->sType= $request['sType'];
        $post->amount= $request['amount'];
        $post->notes= $request['notes'];
        $post->date= $request['date'];
        $post->save();
        return redirect()->route('sales.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post=Sale::find($id);
        $post->delete();
        return redirect()->route('sales.index')
        ->with('success','Product updated successfully');
    }
}