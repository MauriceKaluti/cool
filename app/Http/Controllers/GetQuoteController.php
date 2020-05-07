<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GetQuote;

use Illuminate\Pagination\Paginator;

class GetQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $quotes = GetQuote::paginate(5);


        return view( 'admin.quotes.index', compact( 'quotes' ) );
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


    public function store( Request $request ) {

        //        data validation

        $this->validate( $request, [
            'name'        => 'required',
            'email'        => 'required',
            'phone'       => 'required',
            'company'       => 'required',
            'website'       => 'required',
            'product'       => 'required',
            'message' => 'required',

            'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        ] );


        // Storing data

        $post = GetQuote::create( $request->all() );

        $image = $request->image;

        if ( $image ) {
            $imageName = $image->getClientOriginalName();
            $image->move( 'images', $imageName );
            $post['image'] = $imageName;
        }


        $post->save();

        // redirect to another page

       
        return back()->with("message", "Quote Request Sent, We will get back to you shortly!");
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

          GetQuote::destroy( $id );

        return back();
    }
}
