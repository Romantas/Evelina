@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">LIVE CHAT</div>
                        <div class="card-body" id="app">
                            @if(isset(auth('student')->user()->email) != null)
                                <chat :user="{{ auth('student')->user() }}"></chat>
                            @elseif(isset(auth('company')->user()->email) != null)
                                   <chat :user="{{ auth('company')->user() }}"></chat>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection