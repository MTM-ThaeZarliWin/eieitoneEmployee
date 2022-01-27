@extends('layouts.main')
@section('content')
<!---- page Heading ---->
<div class="d-sm-flex align-item-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">States</h1>
</div>
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create New State
                    <a href="{{ route('states.index')}}" class="float-right">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('states.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('Country Name') }}</label>

                            <div class="col-md-6">
                                <select name="country_id" class="form-control" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{$country->name}}</option>   
                                    @endforeach
                                </select>

                                @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection