@extends( config('lex.layout') )

@section( config('lex.section') )

  <h3>'{{ $resource->name }}' Quantities</h3>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading clearfix">
          <h3 class="panel-title"><i class="fa fa-users fa-lg"></i> Users with {{ $resource->name }} <small class="text-muted">{{$resource->users->count()}} accounts having a total of {{$total}} {{$resource->name}}</small></h3>
        </div>
        
        <div class="panel-body">
          @forelse($resource->users->chunk(4) as $chunk)
            @foreach($chunk as $c)
            <div class="col-md-3 col-sm-3 col-xs-4">
            {{ $c->name }} <span class="text-muted">({{ $c->pivot->quantity }})</span>
            </div>
            @endforeach
          @empty
            <span class="text-warning"><i class="fa fa-warning text-warning"></i> This currency is not held by any one.</span>
          @endforelse
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-success">
        
        <div class="panel-body">
          {!! Form::model($resource, [ 'route' => [ config('lex.route.as') . 'cumulative', $resource->id ], 'class' => 'form-horizontal']) !!}
          
          <h4>Assign
          <input type="number" placeholder="1" value=1 name="quantity"> <strong>{{ str_plural($resource->name) }}</strong> to each of the checked users below. <br />
          <small class="text-muted">Positive amounts will be added, negative amounts will be removed</small></h4>
          
          <hr />
          
          <div  style="overflow:auto; height:200px">
          @forelse($users->chunk(6) as $c)
            @foreach ($c as $u)
            <div class="col-md-2 col-sm-3 col-xs-4">
            <label class="checkbox-inline" title="{{ $u->user_id }}">
              <input type="checkbox" name="user_id[]" value="{{$u->id}}"> {{ $u->name }}
            </label>
            </div>
            @endforeach
          @empty
            <span class="text-warning"><i class="fa fa-warning text-warning"></i> There aren't any users....?</span>
          @endforelse
          </div>
          
          <hr />

          <div class="form-group">
            <div class="col-sm-3">
              {!! Form::submit('Update User Currencies', ['class' => 'btn btn-success form-control']) !!}
            </div>    
          </div>

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection