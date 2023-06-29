@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">New Url</div>

                    <div class="card-body">
                        <h4 class="text-center mt-1 mb-2">
                            Create A New Url
                        </h4>
                        <form method="POST" action="{{ route('url.store') }}">
                            @csrf
                            <div class="mb-3">
                              <label for="url" class="form-label">Url Address</label>
                              <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="Exmaple : https://url.com" required autofocus>
                              @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
