@extends('layouts.app')

@section('content')
<div class="container">
    @component('components.register-buttons')
    @endcomponent
    <section id="company">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ĮMONĖ') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('CompanyRegister') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pavadinimas') }}</label>

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
                                <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Įmonės sritis') }}</label>

                                <div class="col-md-6">
                                    <input id="area" type="text" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ old('area') }}" required autofocus>

                                    @if ($errors->has('area'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adresas') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="income" class="col-md-4 col-form-label text-md-right">{{ __('Pajamos') }}</label>

                                <div class="col-md-6">
                                    <input id="income" type="text" class="form-control{{ $errors->has('income') ? ' is-invalid' : '' }}" name="income" value="{{ old('income') }}" required autofocus>

                                    @if ($errors->has('income'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('income') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="workers_count" class="col-md-4 col-form-label text-md-right">{{ __('Darbuotojų skaičius') }}</label>

                                <div class="col-md-6">
                                    <input id="workers_count" type="text" class="form-control{{ $errors->has('workers_count') ? ' is-invalid' : '' }}" name="workers_count" value="{{ old('workers_count') }}" required autofocus>

                                    @if ($errors->has('workers_count'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('workers_count') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ceo" class="col-md-4 col-form-label text-md-right">{{ __('CEO') }}</label>

                                <div class="col-md-6">
                                    <input id="ceo" type="text" class="form-control{{ $errors->has('ceo') ? ' is-invalid' : '' }}" name="ceo" value="{{ old('ceo') }}" required autofocus>

                                    @if ($errors->has('ceo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ceo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('logo') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" value="{{ old('logo') }}" autofocus>

                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('logo') }}</strong>
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
