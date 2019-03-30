@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full-right">
                    <h2>{{ $practice->title }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $practice->body !!}
            </div>
        </div>
    </div>
@endsection