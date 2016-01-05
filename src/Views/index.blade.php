@extends('watchtower::layouts.master' )

@section('content')

    <h1>Currencies <a href="{{ url('/currency/create') }}" class="btn btn-primary pull-right btn-sm">Add New Currency</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL.</th><th>Name</th><th>Image</th><th>Base Value</th><th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($currencies as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/currency', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->image }}</td><td>{{ $item->base_value }}</td>
                    <td><a href="{{ url('/currency/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> / {!! Form::open(['method'=>'delete','action'=>['CurrencyController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection