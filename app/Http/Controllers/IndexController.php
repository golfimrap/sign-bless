<?php

namespace App\Http\Controllers;

use App\Bless;
use App\Signature;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_bless = Bless::where('status', 1)->first();
        
        return view('frontend.pages.index', compact([
            'data_bless'
        ]));
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
        $slug_name = Signature::select('slug')->where('name_surname', $request->name_surname)->first();

        if ($slug_name == null) {
            $field_signature = new Signature;
            $field_signature->bless_id = $request->bless_id;
            $field_signature->name_surname = $request->name_surname;
            if ($field_signature->save()) {

                $signature_slug = Signature::select('slug')
                            ->where('id', $field_signature->id)
                            ->first();

                return redirect()->route('index.sign.show', [$signature_slug->slug]);
            }
        } else {
            return redirect()->route('index.sign.show', [$slug_name->slug]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // dd($slug);
        $data_signature = Signature::where('slug', $slug)->first();
        $data_bless = Bless::where('id', $data_signature->bless_id)->first();
        
        return view('frontend.pages.show', compact([
            'data_bless',
            'data_signature'
        ]));
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
    }
}
