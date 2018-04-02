@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">
                        <span>My Log </span>

                        <span class="float-right">
                            {{ \Carbon\Carbon::today()->format('d-M-Y') }}
                        </span>
                    </div>

                    <div class="card-body col-md-12 ">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
