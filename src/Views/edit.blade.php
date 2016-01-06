@extends( config('lex.layout') )

@section( config('lex.section') )

    <h1>{{ ( ($show == '0') ? 'Edit' : 'Viewing' ) }}  {{ $resource->name }}</h1>
    <hr/>

    {!! Form::model($resource, ['method' => 'PATCH', 'route' => [ 'lex.update', $resource->id ], 'class' => 'form-horizontal']) !!}
    {!! Form::hidden('id', $resource->id) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'Slug: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('base_value', 'Base Value: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::number('base_value', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('convertible', 'Convertible: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-sm btn-primary{{ $resource->convertible == 1 ? ' active' : '' }}">
                {!! Form::radio('convertible',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary{{ $resource->convertible == 0 ? ' active' : '' }}">
                {!! Form::radio('convertible',0, null, ['class' => 'form-control'] ) !!} No
              </label>

              <label data-toggle="tooltip" data-placement="right" class="btn btn-sm btn-default" title="Can be converted into other currencies?">
                <i class="fa fa-lg fa-question-circle"></i>
              </label>
              
            </div>
        </div>      
        {!! $errors->first('convertible', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('tradeable', 'Tradeable: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-sm btn-primary{{ $resource->tradeable == 1 ? ' active' : '' }}">
                {!! Form::radio('tradeable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary{{ $resource->tradeable == 0 ? ' active' : '' }}">
                {!! Form::radio('tradeable',0, null, ['class' => 'form-control'] ) !!} No
              </label>

              <label data-toggle="tooltip" data-placement="right" class="btn btn-sm btn-default" title="Can be traded amongst users?">
                <i class="fa fa-lg fa-question-circle"></i>
              </label>
            </div>
        </div>      
        {!! $errors->first('tradeable', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('sellable', 'Sellable: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-sm btn-primary{{ $resource->sellable == 1 ? ' active' : '' }}">
                {!! Form::radio('sellable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary{{ $resource->sellable == 0 ? ' active' : '' }}">
                {!! Form::radio('sellable',0, null, ['class' => 'form-control'] ) !!} No
              </label>

              <label data-toggle="tooltip" data-placement="right" class="btn btn-sm btn-default" title="Can be sold amongst users?">
                <i class="fa fa-lg fa-question-circle"></i>
              </label>
            </div>
        </div>      
        {!! $errors->first('sellable', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('rewardable', 'Rewardable: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-sm btn-primary{{ $resource->rewardable == 1 ? ' active' : '' }}">
                {!! Form::radio('rewardable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary{{ $resource->rewardable == 0 ? ' active' : '' }}">
                {!! Form::radio('rewardable',0, null, ['class' => 'form-control'] ) !!} No
              </label>

              <label data-toggle="tooltip" data-placement="right" class="btn btn-sm btn-default" title="Can be given as a reward?">
                <i class="fa fa-lg fa-question-circle"></i>
              </label>
            </div>
        </div>      
        {!! $errors->first('rewardable', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('discoverable', 'Discoverable: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-sm btn-primary{{ $resource->discoverable == 1 ? ' active' : '' }}">
                {!! Form::radio('discoverable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary{{ $resource->discoverable == 0 ? ' active' : '' }}">
                {!! Form::radio('discoverable',0, null, ['class' => 'form-control'] ) !!} No
              </label>

              <label data-toggle="tooltip" data-placement="right" class="btn btn-sm btn-default" title="Can be discovered('found') by users with some sort of loot/search function(s)?">
                <i class="fa fa-lg fa-question-circle"></i>
              </label>
            </div>
        </div>      
        {!! $errors->first('discoverable', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('available', 'Available: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-sm btn-primary{{ $resource->available == 1 ? ' active' : '' }}">
                {!! Form::radio('available',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary{{ $resource->available == 0 ? ' active' : '' }}">
                {!! Form::radio('available',0, null, ['class' => 'form-control'] ) !!} Retired
              </label>

              <label class="btn btn-sm btn-primary{{ $resource->available == 2 ? ' active' : '' }}">
                {!! Form::radio('available',2, null, ['class' => 'form-control'] ) !!} Devalued
              </label>

              <label data-toggle="tooltip" data-placement="right" class="btn btn-sm btn-default" title="Is it still available? If it isn't, is it worthless now (devalued)?">
                <i class="fa fa-lg fa-question-circle"></i>
              </label>
            </div>
        </div>      
        {!! $errors->first('available', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('type', 'Type: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'For your classification / filtering needs.']) !!}
        </div>
        {!! $errors->first('type', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}  
    </div>

    <div class="form-group">
        {!! Form::label('notes', 'Notes: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
        </div>
        {!! $errors->first('notes', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!} 
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
           @if ($show == '0')
            {!! Form::submit('Edit', ['class' => 'btn btn-primary form-control']) !!}
           @else
                <i class="fa fa-pencil"></i> 
                <a href="{{ route('lex.edit', $resource->id) }}" title="Edit '{{ $resource->name }}'">Edit '{{ $resource->name }}'</a>
           @endif
        </div>    
    </div>
    {!! Form::close() !!}

@endsection