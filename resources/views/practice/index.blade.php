@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full-right">
                    <h2>Practice</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Nr.</div>
            <div class="col-md-6">Title</div>
            <div class="col-md-1">Update</div>
            <div class="col-md-1">Delete</div>
        </div>
        <form method="POST" action="{{ route('practice.destroy',1) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit"></button>
        </form>
    </div>
@endsection