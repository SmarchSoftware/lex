@extends('layouts.master')

@section('content')

    <h1>Currency</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Image</th><th>Base Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $currency->id }}</td> <td> {{ $currency->name }} </td><td> {{ $currency->image }} </td><td> {{ $currency->base_value }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection