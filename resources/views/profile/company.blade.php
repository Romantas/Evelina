@extends('layouts.app')

@section('content')
    <div class="container">
        <section id="student">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Profilis') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('CompanyProfile.update', $company->id) }}" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="form-group row">
                                    <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('name') }}</label>

                                    <div class="col-md-7">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $company->name }}" required>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="area" class="col-md-3 col-form-label text-md-right">{{ __('area') }}</label>

                                    <div class="col-md-7">
                                        <input id="area" type="text" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ $company->area }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="area" class="col-md-3 col-form-label text-md-right">{{ __('address') }}</label>

                                    <div class="col-md-7">
                                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $company->address }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="income" class="col-md-3 col-form-label text-md-right">{{ __('income') }}</label>

                                    <div class="col-md-7">
                                        <input id="income" type="text" class="form-control{{ $errors->has('income') ? ' is-invalid' : '' }}" name="income" value="{{ $company->income }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="workers_count" class="col-md-3 col-form-label text-md-right">{{ __('workers_count') }}</label>

                                    <div class="col-md-7">
                                        <input id="workers_count" type="text" class="form-control{{ $errors->has('workers_count') ? ' is-invalid' : '' }}" name="workers_count" value="{{ $company->workers_count }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ceo" class="col-md-3 col-form-label text-md-right">{{ __('ceo') }}</label>

                                    <div class="col-md-7">
                                        <input id="ceo" type="text" class="form-control{{ $errors->has('ceo') ? ' is-invalid' : '' }}" name="ceo" value="{{ $company->ceo }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="logo" class="col-md-3 col-form-label text-md-right">{{ __('logo') }}</label>

                                    <div class="col-md-7">
                                        <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" value="{{ $company->logo }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Kurti') }}
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