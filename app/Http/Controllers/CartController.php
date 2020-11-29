<?php

namespace App\Http\Controllers;


use App\Burger;
use App\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cartItems= \Cart::session(auth()->id())->getContent();
        return view('cart.index',compact('cartItems'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Burger $burger)
    {
        \Cart::session(auth()->id())->add(array(
            'id' => $burger->id ,
            'name' => $burger->burger_name,
            'price' => $burger->burger_price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $burger
        ));

        return redirect()->route('cart.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($rowId)
    {

        \Cart::session(auth()->id())->update($rowId,[
            'quantity' => [
                'relative' => false,
                'value' => request('quantity')
            ]
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($burgerId)
    {
        \Cart::session(auth()->id())->remove($burgerId);

        return back();

    }

    public function checkout()
    {
        return view('cart.checkout');

    }

}
