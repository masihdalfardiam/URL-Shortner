@php
    use chillerlan\QRCode\QRCode;
    use Morilog\Jalali\Jalalian;
@endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Urls</div>

                    <div class="card-body">
                        <h4 class="text-center mt-1 mb-2">
                            Your Urls
                            <a class="btn btn-sm btn-success" href="{{ route('url.create') }}">Create</a>
                        </h4>
                        <table class="table text-center align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Url</th>
                                    <th>Short Url</th>
                                    <th>Visit</th>
                                    <th>Creation Time</th>
                                    <th>QR Code</th>
                                    <th>Delete/Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($urls as $url)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $url->url }}</td>
                                        <td>{{ request()->root().'/link/'.$url->short_url }}</td>
                                        <td>{{ $url->visit }}</td>
                                        <td>{{ Jalalian::forge(strtotime($url->created_at))->addHours(3)->addMinutes(30) }}</td>
                                        <td>
                                            <a href="{{ route('url.qrcode',$url->id) }}" target="_blank"><img src="{{ (new QRCode)->render(request()->root().'/link/'.$url->short_url) }}" alt="QR Code" width="64" height="64" /></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="{{ route('url.edit', $url->id) }}">Edit</a>
                                            <button class="btn btn-sm btn-danger" data-id="{{$url->id}}" id="delete">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($urls) == 0)
                            <h5 class="text-danger text-center">
                                No Url Inserted
                            </h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
