@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                        <span class="float-right">
                            {{ \Carbon\Carbon::today()->format('d-M-Y') }}
                        </span>
                    </div>

                    <div class="card-body col-md-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">

                                    <form class="form-inline" action="#" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <input type="text" placeholder="Add New Activity" class="form-control" id="activity">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>

                                    </form>


                                @php
                                    $activity = \App\Activity::all();
                                @endphp
                                {{--<h3>Current Activity </h3>--}}
                                <table class="table">
                                    <thead class="table-primary">
                                    <tr>
                                        <th class="text-center">Listed Activity</th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($activity as $item)
                                        <tr>
                                            <input type="hidden" id="id" value="{{ $item->id }}" >
                                            <td id="name">{{$item->name  }}</td>
                                            {{--<td><button id="add" name="add" class="btn btn-success">Add to log</button></td>--}}
                                            <td><i title="Add to Log" style="cursor: pointer;" id="add" class="fa fa-plus fa-lg"></i></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-6">

                                <form action="#" method="post">
                                    {{ csrf_field() }}

                                    <table class="table table-active">
                                        <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Today's Activity</th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($activity as $item)
                                            <tr>
                                                <td>{{$item->name  }}</td>
                                                <td><i class="fa fa-remove"></i> </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-primary float-right">Submit</button>

                                </form>


                            </div>
                        </div>
                        {{--<div class="row justify-content-center">--}}

                        {{--</div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
