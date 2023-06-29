@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header text-center">Welcome To Url Shortener Website</h4>
                <div class="card-body text-center">
                    First you should to sign up then you can make your own short links
                </div>
                <div class="row justify-content-evenly mb-2">
                    <div class="col-md-4 d-flex justify-content-center">
                        <img src="{{ asset('images/img1.png') }}" alt="img" width="128" height="128">
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <img src="{{ asset('images/img2.png') }}" alt="img" width="128" height="128">
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <img src="{{ asset('images/img3.png') }}" alt="img" width="128" height="128">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
