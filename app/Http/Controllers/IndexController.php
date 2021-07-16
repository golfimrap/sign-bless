<?php

namespace App\Http\Controllers;

use App\Bless;
use App\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        if ($data_bless != null) {
            if (date("Y-m-d") > $data_bless->end_date_bless) {
                $field_bless = Bless::find($data_bless->id);
                $field_bless->status = 0;

                if ($field_bless->save()) {
                    return Redirect::to('https://ddc.moph.go.th/index.php');
                }
            } else {
                return view('frontend.pages.index', compact([
                    'data_bless'
                ]));
            }
        } else {
            return Redirect::to('https://ddc.moph.go.th/index.php');
        }
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
        $data_name_surname = Signature::where('name_surname', $request->name_surname)->where('bless_id', $request->bless_id)->first();
       
        if ($data_name_surname == null) {
            $field_signature = new Signature;
            $field_signature->bless_id = $request->bless_id;
            $field_signature->name_surname = $request->name_surname;
            if ($field_signature->save()) {

                $signature_slug = Signature::where('id', $field_signature->id)
                            ->first();

                return redirect()->route('index.sign.show', [$signature_slug->bless_id, $signature_slug->name_surname]);
            }
        } else {
            return redirect()->route('index.sign.show', [$data_name_surname->bless_id, $data_name_surname->name_surname]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bless_id, $name_surname)
    {
        $data_signature = Signature::where('name_surname', $name_surname)->where('bless_id', $bless_id)->first();
        $data_bless = Bless::where('id', $data_signature->bless_id)->first();
        // dd($data_signature);
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
