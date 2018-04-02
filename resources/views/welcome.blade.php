@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">

                        <span class="float-right">
                            {{ \Carbon\Carbon::today()->format('d-M-Y') }}
                        </span>
                    </div>
                    <div class="card-body col-md-12 ">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection