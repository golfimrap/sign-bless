<?php

namespace App\Http\Controllers;

use App\Bless;
use App\Models\Signature;
use Illuminate\Http\Request;
use Validator;
use File;
class BlessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_bless = Bless::orderBy('id', 'DESC')->get();
        $data_bless = Bless::withCount('Signature')->orderBy('id', 'DESC')->get();
        // dd($data_bless);
        return view('backend.pages.bless.index', compact([
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
        return view('backend.pages.bless.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->hasFile('file_background')) {
            $rules = [
                'file_background' => 'mimes:jpg,jpeg,png',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->with('error',$validator->errors()->first());
            }

            $file_background_ori = $request->file('file_background');
            $file_background_new = time().rand(1,1000).".".$file_background_ori->getClientOriginalExtension();
        }

        if ($request->hasFile('file_picture')) {
            $rules = [
                'file_picture' => 'mimes:jpg,jpeg,png',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->with('error',$validator->errors()->first());
            }

            $file_picture_ori = $request->file('file_picture');
            $file_picture_new = time().rand(1,1000).".".$file_picture_ori->getClientOriginalExtension();
        }

        if ($request->hasFile('file_text')) {
            $rules = [
                'file_text' => 'mimes:jpg,jpeg,png',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->with('error',$validator->errors()->first());
            }

            $file_text_ori = $request->file('file_text');
            $file_text_new = time().rand(1,1000).".".$file_text_ori->getClientOriginalExtension();
        }

        $field_bless = new Bless;
        $field_bless->title_name = $request->title_name;
        $field_bless->file_background = $file_background_new;
        $field_bless->file_picture = $file_picture_new;
        $field_bless->file_text = $file_text_new;
        $field_bless->start_date_bless = $request->start_date_bless;
        $field_bless->end_date_bless = $request->end_date_bless;
        $field_bless->button_text = $request->button_text;
        $field_bless->button_color = $request->button_color;
        $field_bless->text_color = $request->text_color;
        $field_bless->save();

        $last_id = $field_bless->id;
        $file_background_ori->storeAs('public/upload_images/backgrounds/'.$last_id, $file_background_new);
        $file_picture_ori->storeAs('public/upload_images/peoples/'.$last_id, $file_picture_new);
        $file_text_ori->storeAs('public/upload_images/texts/'.$last_id, $file_text_new);

        return redirect()->route('response-clear-cache', 'backoffice.bless.index');
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
    public function edit(Request $request)
    {
        $data_bless = Bless::find($request->id);
        return view('backend.pages.bless.edit', compact([
            'data_bless'
        ]));
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
        $field_bless = Bless::find($id);
        $field_bless->title_name = $request->title_name;
        $field_bless->slug = null;

        if ($request->file_background) {
            $path_file = storage_path('app/public/upload_images/backgrounds/'.$field_bless->id.'/'.$field_bless->file_background);
            $del_clean = File::delete($path_file);
            if ($del_clean) {
                $file_background_ori = $request->file('file_background');
                $file_background_new = time().rand(1,1000).".".$file_background_ori->getClientOriginalExtension();
                $upload_file = $file_background_ori->storeAs('public/upload_images/backgrounds/'.$field_bless->id, $file_background_new);

                if ($upload_file) {
                    $field_bless->file_background = $file_background_new;
                }
            }
        }

        if ($request->file_picture) {
            $path_file = storage_path('app/public/upload_images/peoples/'.$field_bless->id.'/'.$field_bless->file_picture);
            $del_clean = File::delete($path_file);
            if ($del_clean) {
                $file_picture_ori = $request->file('file_picture');
                $file_picture_new = time().rand(1,1000).".".$file_picture_ori->getClientOriginalExtension();
                $upload_file = $file_picture_ori->storeAs('public/upload_images/peoples/'.$field_bless->id, $file_picture_new);

                if ($upload_file) {
                    $field_bless->file_picture = $file_picture_new;
                }
            }
        }

        if ($request->file_text) {
            $path_file = storage_path('app/public/upload_images/texts/'.$field_bless->id.'/'.$field_bless->file_text);
            $del_clean = File::delete($path_file);
            if ($del_clean) {
                $file_text_ori = $request->file('file_text');
                $file_text_new = time().rand(1,1000).".".$file_text_ori->getClientOriginalExtension();
                $upload_file = $file_text_ori->storeAs('public/upload_images/texts/'.$field_bless->id, $file_text_new);
                if ($upload_file) {
                    $field_bless->file_text = $file_text_new;
                }
            }
        }

        $field_bless->start_date_bless = $request->start_date_bless;
        $field_bless->end_date_bless = $request->end_date_bless;
        $field_bless->button_text = $request->button_text;
        $field_bless->button_color = $request->button_color;
        $field_bless->text_color = $request->text_color;
        
        if ($field_bless->save()) {
            return redirect()->route('response-clear-cache', 'backoffice.bless.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $path_file_backgrounds = storage_path('app/public/upload_images/backgrounds/'.$id);
        $path_file_peoples = storage_path('app/public/upload_images/peoples/'.$id);
        $path_file_texts = storage_path('app/public/upload_images/texts/'.$id);
        
        File::deleteDirectory($path_file_backgrounds);
        File::deleteDirectory($path_file_peoples);
        File::deleteDirectory($path_file_texts);
        
        if(Bless::destroy($id)) {
            return redirect()->route('response-clear-cache', 'backoffice.bless.index');
        }
    }
}
