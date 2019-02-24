@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full-right">
                    <h2>Practice</h2>
                    <a href="{{ route('practice.create') }}">KURTI</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Nr.</div>
            <div class="col-md-4">Title</div>
            <div class="col-md-4">Body</div>
            <div class="col-md-1">Update</div>
            <div class="col-md-1">Delete</div>
        </div>
        @foreach($practices as $i => $practice)
            <div class="row">
                <div class="col-md-2">{{$i+=1}}</div>
                <div class="col-md-4">{{$practice->title}}</div>
                <div class="col-md-4">{!! $practice->body !!}</div>
                <div class="col-md-1">
                    <a href="practice/{{$practice->id}}/edit">UPDATE</a>
                </div>
                <div class="col-md-1">
                    <form method="POST" action="{{ route('practice.destroy',$practice->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit">DELETE</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection