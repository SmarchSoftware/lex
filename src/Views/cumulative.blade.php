@extends( config('lex.layout') )

@section( config('lex.section') )

  <h1>'{{ $resource->name }}' Users</h1>
  <hr/>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-success">
        
        <div class="panel-body">
          {!! Form::model($resource, [ 'route' => [ config('lex.route.as') . 'cumulative', $resource->id ], 'class' => 'form-horizontal']) !!}
          
          <h4>Assign
          <input type="number" placeholder="1" min> <strong>{{ str_plural($resource->name) }}</strong> to each of the checked users below. <br />
          <small class="text-muted">Positive amounts will be added, negative amounts will be removed</small></h4>
          
          <hr />
          
          <div  style="overflow:auto; height:200px">
          @forelse($users->chunk(6) as $c)
            @foreach ($c as $u)
            <div class="col-md-2 col-sm-3 col-xs-4">
            <label class="checkbox-inline" title="{{ $u->slug }}">
              <input type="checkbox" name="slug[]" value="{{$u->id}}"> {{ $u->name }}
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