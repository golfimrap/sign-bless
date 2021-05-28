@extends('frontend.layouts.master')
@section('title')
    @if (!$data_bless == null)
        {{ $data_bless->title_name }}
    @endif
@endsection
@section('css-custom-script')
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend/css/dna.global.css') }}">
@endsection
@section('css-custom')
    @if (!$data_bless == null)
        <style>
            body {
                background-image: url('{{ asset('storage/upload_images/backgrounds/'.$data_bless->id.'/'.$data_bless->file_background) }}');
            }
            .textbox  { 
                background: #f5f5f5; 
                /* font-size: 0.8rem;  */
                -moz-border-radius: 3px; 
                -webkit-border-radius: 3px; 
                border-radius: 3px; 
                border: none; 
                padding: 13px 10px; 
                width:270px; 
                margin-bottom: 20px; 
                box-shadow: inset 0px 2px 3px rgba( 0,0,0,0.1 ); 
                clear: both; 
            } 
            .textbox:focus { 
                background: #fff; 
                box-shadow: 0px 0px 0px 3px #fff38e, inset 0px 2px 3px rgba( 0,0,0,0.2 ), 0px 5px 5px rgba( 0,0,0,0.15 ); 
                outline: none;   
            }

            .button {
                background-color: {{ $data_bless->button_color }}; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
            }

            .button2:hover {
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            }
        </style>
    @endif
@endsection
@section('content')
    <div id="container">
        <div class="row">
            <div align="center">
                <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 col-md-offset-2 col-xs-offset-1">
                    <div align="center">
                        <img src="{{ asset('storage/upload_images/peoples/'.$data_bless->id.'/'.$data_bless->file_picture) }}">
                    </div>
                </div>
            </div>
            <div align="center">
                <div class="v_gap40">
                    <div class="col-lg-5 col-md-5 col-sm-10 col-xs-10 col-md-offset-0 col-xs-offset-1">
                        <div>
                            <img src="{{ asset('storage/upload_images/texts/'.$data_bless->id.'/'.$data_bless->file_text) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear:both"></div>
            <div class="t_gap20"></div>
            @if (date("Y-m-d") >= $data_bless->start_date_bless  && date("Y-m-d") <= $data_bless->end_date_bless)
                <form method="POST" action="{{ route('index.sign.store') }}">
                    @csrf
                    <div align="center">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-centered">
                            <label style="font-size: 20px; color:{{ $data_bless->text_color }}; font-weight: 100; ">ข้าพระพุทธเจ้า</label>
                            <input class="textbox" type="text" name="name_surname" placeholder="ชื่อ - นามสกุล">
                            <input type="hidden" name="bless_id" value="{{ $data_bless->id }}">
                        </div>
                        <button class="button button2" type="submit">{{ $data_bless->button_text }}</button>
                    </div>
                </form>
            @else
                <div align="center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-centered">
                        <a href="https://ddc.moph.go.th/index.php">
                            <button class="button button2" type="submit">เข้าสู่เว็บไซต์</button>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
