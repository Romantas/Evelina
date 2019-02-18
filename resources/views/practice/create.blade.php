@extends('layouts.app')

@section('content')
<div class="container">
    <section id="student">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Praktika') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('practice.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('title') }}</label>

                                <div class="col-md-7">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="body" class="col-md-3 col-form-label text-md-right">{{ __('body') }} required</label>

                                <div class="col-md-7">
                                    <textarea id="body" type="text" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" value="{{ old('body') }}"></textarea>
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
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection