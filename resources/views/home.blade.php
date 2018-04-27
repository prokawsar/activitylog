@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        {{ session('status') }}
                    </div>
                @endif
                @php
                    $check = \App\Log::whereDate('created_at', DB::raw('CURDATE()'))->first();
                    //  dd($check);
                @endphp
                @if($check)
                <div class="alert alert-success" role="alert">
                        You have added your log today.  

                        <span class="btn btn-primary float-right"> Re Add</span>  
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <span>Activity Tracker </span>
                        
                        @php
                            $timestamp = \Carbon\Carbon::now();
                            $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Asia/Dhaka');
                            
                        @endphp
                        <span class="float-right">
                            <div id="clock"></div>
                            {{ $date->format('d-M-Y') }}
                        </span>
                    </div>
                    

                    <div class="card-body col-md-12 @if( $check) disabledDiv @endif ">
                        

                        <div class="row">
                            <div class="col-md-6">
                                @php
                                    $activity = \App\Activity::where('enable', 1)->get();
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
                                            <input type="hidden" id="id{{ $item->id }}" value="{{ $item->id }}">
                                            <td id="name{{ $item->id }}">{{$item->name  }}</td>
                                            {{--<td><button id="add" name="add" class="btn btn-success">Add to log</button></td>--}}
                                            <td onclick="getID({{ $item->id }})"><i title="Add to Log"
                                                                                    style="cursor: pointer; color: #0000F0;"
                                                                                    id="add"
                                                                                    class="fa fa-plus fa-lg"></i>
                                                &nbsp;
                                                <i onclick="window.location = '/disable{{$item->id }}'"
                                                   title="Disable Activity"
                                                   style="cursor: pointer; color: #ac2925;"
                                                   id="disable" class="fa fa-ban fa-lg"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-6">

                                <form action="{{ route('savelog') }}" method="post">
                                    {{ csrf_field() }}

                                    <table class="table table-active" id="items">
                                        <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Today's Activity</th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody id="log">

                                        {{--<tr>--}}
                                        {{--<td></td>--}}
                                        {{--<td><i title="Remove" style="cursor: pointer;" id="remove"--}}
                                        {{--class="fa fa-remove"></i></td>--}}
                                        {{--</tr>--}}

                                        </tbody>
                                    </table>

                                    <button id="submit" type="submit" class="btn btn-primary float-right">Submit</button>

                                </form>


                            </div>

                            <div class="col-md-6">
                                @php
                                    $activity = \App\Activity::where('enable', 0)->get();
                                @endphp
                                {{--<h3>Current Activity </h3>--}}
                                <table class="table">
                                    <thead class="table-primary">
                                    <tr>
                                        <th class="text-center">Disabled Activity</th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($activity as $item)
                                        <tr>
                                            <input type="hidden" id="id{{ $item->id }}" value="{{ $item->id }}">
                                            <td id="name{{ $item->id }}">{{$item->name  }}</td>
                                            {{--<td><button id="add" name="add" class="btn btn-success">Add to log</button></td>--}}
                                            <td onclick="window.location = '/enable{{$item->id }}'"><i title="Enable"
                                                                                                       style="cursor: pointer; color: #0000F0;"

                                                                                                       class="fa fa-refresh fa-lg"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>

                        {{--<div class="col-md-6">--}}
                            {{--<form class="form-inline" action="{{ route('addactivity') }}" method="post">--}}
                                {{--{{ csrf_field() }}--}}

                                {{--<div class="form-group">--}}
                                    {{--<input type="text" name="activity" placeholder="Add New Activity"--}}
                                           {{--class="form-control"--}}
                                           {{--id="activity">--}}
                                {{--</div>--}}
                                {{--<button type="submit" class="btn btn-primary">Add</button>--}}

                            {{--</form>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
