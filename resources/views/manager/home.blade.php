@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Manager Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h3>
                                {{ Auth::guard('manager')->user()->name }}
                            </h3>
                            <div class=" ">
                                <a class="btn btn-sm rounded btn-danger" href="{{ route('manager.logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('manager.logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
