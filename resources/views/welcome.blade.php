@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-2 offset-md-10">
                    <form action="/search" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">PAIEŠKA</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            @foreach($practices as $practice)
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="row">
                        <a href="/company/practice/{{$practice->id}}">
                            <div class="col-md-4"><img src="{{ asset("storage/company/$practice->logo") }}"></div>
                            <div class="col-md-2">{{ $practice->title }}</div>
                            <div class="col-md-6">{!! $practice->body !!}</div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
@endsection
