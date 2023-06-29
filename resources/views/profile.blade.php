@php
    use chillerlan\QRCode\QRCode;
    use Morilog\Jalali\Jalalian;
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    <h4 class="text-center mb-2 mt-1">User Profile Information</h4>
                    <table class="table table-bordered text-center">
                        <tr>
                            <td>Name : </td>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Username : </td>
                            <td>{{ auth()->user()->username }}</td>
                        </tr>
                        <tr>
                            <td>Email : </td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Sign Up at : </td>
                            <td>{{ Jalalian::forge(strtotime(auth()->user()->created_at))->addHours(3)->addMinutes(30) }}</td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-center my-1">
                        <a class="btn btn-primary" href="{{ route('profile.changePasswordForm') }}">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
