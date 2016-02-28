@extends( config('lex.layout') )

@section( config('lex.section') )

  <h3>'{{ $resource->name }}' Quantities</h3>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading clearfix">
          <h3 class="panel-title"><i class="fa fa-users fa-lg"></i> Characters with {{ $resource->name }}
          </h3>
        </div>
        
        <div class="panel-body">
          <div>
            <button class="btn btn-primary pull-right" type="button" data-toggle="collapse" data-target="#collapseAccounts" aria-expanded="false" aria-controls="collapseAccounts">
            <i class="fa fa-users"></i> View Accounts
            </button>
            <span class="lead">

            {{$resource->characters->count()}} of {{$characters->count()}} character accounts have a total of {{ $total }} {{ ($total == 1) ? $resource->name : str_plural($resource->name) }}</span>
            <br /><span class="text-muted">
            <i class="fa fa-money"></i> Base value worth: {{ $value }} {{ ($value == 1) ? $base->name : str_plural($base->name)}}
            <br />
            <i class="fa fa-leaf"></i> Common value worth: {{ $common_value }} {{ ($common_value == 1) ? $common->name : str_plural($common->name)}}
            </span>
          </div>

          <div class="panel-collapse collapse" id="collapseAccounts">

            <hr />

            <div style="overflow:auto; max-height:250px">
            @forelse($resource->characters->chunk(4) as $chunk)
              @foreach($chunk as $c)
              <div class="col-md-3 col-sm-3 col-xs-4">
              {{ $c->name }} <span class="text-muted">({{ $c->pivot->quantity }})</span>
              </div>
              @endforeach
            @empty
              <span class="text-warning"><i class="fa fa-warning text-warning"></i> This currency is not held by any one.</span>
            @endforelse
            </div>

            <hr />

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAccounts" aria-expanded="false" aria-controls="collapseAccounts">
              <i class="fa fa-times"></i> Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if ($errors->has())
  <div class="alert alert-danger">
  <strong>Whoops!</strong> Please correct the following errors:
  <ul>
    @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
    @endforeach
  </ul>
  </div>
  @endif

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-success">
        
        <div class="panel-body">
          {!! Form::model($resource, [ 'route' => [ config('lex.route.as') . 'cumulative', $resource->id ], 'class' => 'form-horizontal']) !!}
                    
          <fieldset>
            <legend>Assign
              <input type="number" placeholder="1" value=1 name="quantity"> <strong>{{ str_plural($resource->name) }}</strong> to each of the checked characters below. <br />
              <small class="text-muted">Positive amounts will be added, negative amounts will be removed</small>
            </legend>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="checkbox" name="select_all" id="select_all" onChange="$('.checkbox_class').prop('checked', $(this).prop('checked'));"> Select All
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12" style="overflow:auto; max-height:250px">
                @forelse($characters->chunk(6) as $c)
                  @foreach ($c as $u)
                  <div class="col-md-2 col-sm-3 col-xs-6">
                  <label class="checkbox-inline" title="{{ $u->name }}">
                    <input type="checkbox" class="checkbox_class" name="character_id[]" value="{{$u->id}}"> {{ $u->name }}
                  </label>
                  </div>
                  @endforeach
                @empty
                  <span class="text-warning"><i class="fa fa-warning text-warning"></i> There aren't any characters....?</span>
                @endforelse
              </div>
            </div>

          </fieldset>

          <hr />

          <div class="form-group">
            <div class="col-sm-4 col-xs-6">
              {!! Form::submit('Update Character Currencies', ['class' => 'btn btn-success form-control']) !!}
            </div>    
          </div>

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@endsection