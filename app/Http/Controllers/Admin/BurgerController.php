<?php

namespace App\Http\Controllers\Admin;

use App\Burger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;


class BurgerController extends Controller
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
        //
        $burgers = Burger::get();
        return view('admin.burgers.index')->with('burgers', $burgers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('admin.burgers.create');
    }

    public function addBurger(Request $request)
    {
        //
        $burger = new Burger();
        $burger->burger_name = $request->burger_name;
        $burger->burger_price = $request->burger_price;
        $burger->burger_description = $request->burger_description;

        if ($request->hasFile('burger_image')) {
            $file = $request->file('burger_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/burgerImages/', $filename);
            $burger->burger_image = $filename;
        } else {
            return $request;
            $burger->burger_image = '';
        }

        $burger->save();

        Session::put('success', 'The burger has been added succesfully');

        return redirect('admin/burgers');
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
        if (Gate::denies('edit-burgers')) {
            return redirect(route('admin.burgers.index'));
        }


        return view('admin.burgers.edit')->with([
            'burger' => $burger,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Burger $burger)
    {

        $burger->burger_name = $request->burger_name;
        $burger->burger_description = $request->burger_description;
        $burger->burger_price = $request->burger_price;

        if ($request->hasFile('burger_image')) {
            $file = $request->file('burger_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/burgerImages/', $filename);
            $burger->burger_image = $filename;
        }

        $burger->save();

        return redirect('admin/viewBurger');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Burger $burger)
    {
        if (Gate::denies('delete-burgers')) {
            return redirect(route('admin.burgers.index'));
        }

        $burger->delete();

        return response()->json(['status' => 'Burger Deleted successfully']);
    }
}
