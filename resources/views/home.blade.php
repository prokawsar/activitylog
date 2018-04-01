@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                        <span class="float-right">
                            {{ \Carbon\Carbon::today()->toDateString() }}
                        </span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                {{--<h3>Current Activity </h3>--}}
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Current Activity</th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>John</td>
                                        <td><input type="checkbox"></td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-md-offset-3">
                                <form action="#" method="post">
                                    {{ csrf_field() }}
                                    <div class="jumbotron">

                                        <div class="form-group">
                                            <label for="activity">Activity name:</label>
                                            <input type="text" class="form-control" id="activity">
                                        </div>


                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
