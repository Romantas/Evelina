@extends('layouts.app')

@section('content')
<div class="container">
    @component('components.register-buttons')
    @endcomponent
    <section id="student">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('STUDENTAS') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('studentRegister') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vardas') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pavardė') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Gimimo data') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus>

                                    @if ($errors->has('date_of_birth'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Aukštoji mokykla') }}</label>

                                <div class="col-md-6">
                                    <select id="AM" type="radio" class="form-control{{ $errors->has('AM') ? ' is-invalid' : '' }}" name="AM" value="{{ old('AM') }}" required autofocus>
                                        <option>VGTU</option>
                                        <option>VU</option>
                                        <option>MRU</option>
                                        <option>KTU</option>
                                    </select>
                                    @if ($errors->has('AM'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('AM') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="study_thing" class="col-md-4 col-form-label text-md-right">{{ __('Studijų programa') }}</label>

                                <div class="col-md-6">
                                    <input id="study_thing" type="text" class="form-control{{ $errors->has('study_thing') ? ' is-invalid' : '' }}" name="study_thing" value="{{ old('study_thing') }}" required autofocus>

                                    @if ($errors->has('study_thing'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('study_thing') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="intresting_things" class="col-md-4 col-form-label text-md-right">{{ __('Dominančios sritys') }}</label>

                                <div class="col-md-6">
                                    <input id="intresting_things" type="text" class="form-control{{ $errors->has('intresting_things') ? ' is-invalid' : '' }}" name="intresting_things" value="{{ old('intresting_things') }}" required autofocus>

                                    @if ($errors->has('intresting_things'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('intresting_things') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="CV" class="col-md-4 col-form-label text-md-right">{{ __('CV') }}</label>

                                <div class="col-md-6">
                                    <input id="CV" type="file" class="form-control{{ $errors->has('CV') ? ' is-invalid' : '' }}" name="CV" value="{{ old('CV') }}" required autofocus>

                                    @if ($errors->has('CV'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CV') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Miestas') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
