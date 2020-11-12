@extends('layouts.app')

@section('content')

<h1>Pievienot lietvardu</h1>
    <form method="POST" action="/lietvardi/pievienot">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="lietvards" class="col-md-4 col-form-label text-md-right">{{ __('Vards') }}</label>

            <div class="col-md-6">
                <input id="lietvards" type="text" class="form-control @error('lietvards') is-invalid @enderror" name="lietvards" value="{{ old('lietvards') }}" >

                @error('lietvards')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

                <button type="submit" class="btn btn-primary">Pievienot

                </button>
            </div>
        </div>

    </form>
@endsection
