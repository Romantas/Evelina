@extends('layouts.app')

@section('content')
        <div class="container">
            @foreach($practices as $practice)
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="row">
                        <div class="col-md-6">{{ $practice->title }}</div>
                        <div class="col-md-6">{!! $practice->body !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
@endsection
