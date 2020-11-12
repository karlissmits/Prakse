@extends('layouts.app')

@section('content')

<h1>Pievienot darbibas vardu</h1>
    <form method="POST" action="/darbibasvardi/pievienot">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="darbibasv" class="col-md-4 col-form-label text-md-right">{{ __('Vards') }}</label>

            <div class="col-md-6">
                <input id="darbibasv" type="text" class="form-control @error('darbibasv') is-invalid @enderror" name="darbibasv" value="{{ old('darbibasv') }}" >

                @error('darbibasv')
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
