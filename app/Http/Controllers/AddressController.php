<?php

namespace App\Http\Controllers;

use App\Address;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Town;

use Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $address = Address::paginate(3);




        return view( 'admin.address.index', compact( 'address' ) );
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
        //first validate
        // dd('add');

       
           
      

        $towns = Town::pluck( 'name', 'id' );

        

        $emailValidation = auth()->user() ? 'required|email' : 'required|email|unique:users';

        $this->validate($request,[

            'email'=>$emailValidation,

            'addressline'=>'required',
                   
            'phone'=>'required'

        ]);


        // access the currently authorised user and access the address plus details and create.

        if (auth()->user()) {
            # code...
            Auth::user()->address()->create($request->all());
        } else {
            
            Address::create( $request->all() );
 
        }

        

         return redirect()->route('checkout.payment');

        // return back()->with('popup');
         
        // return user to the payment page

        


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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

         Address::destroy( $id );

        return back();
    }
}
