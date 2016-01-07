@extends( config('lex.layout') )

@section( config('lex.section') )

    <h1>Create New Currency</h1>
    <hr/>

    {!! Form::open( ['route' => 'lex.store', 'class' => 'form-horizontal']) !!}
    
    <div class="form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        {!! $errors->first('name', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'Slug: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div>
        {!! $errors->first('slug', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('base_value', 'Base Value: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::number('base_value', null, ['class' => 'form-control']) !!}
        </div>
        {!! $errors->first('base_value', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('convertible', 'Convertible: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-sm btn-primary">
                {!! Form::radio('convertible',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary">
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
              <label class="btn btn-sm btn-primary">
                {!! Form::radio('tradeable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary">
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
              <label class="btn btn-sm btn-primary">
                {!! Form::radio('sellable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary">
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
              <label class="btn btn-sm btn-primary">
                {!! Form::radio('rewardable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary">
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
              <label class="btn btn-sm btn-primary">
                {!! Form::radio('discoverable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary">
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
              <label class="btn btn-sm btn-primary">
                {!! Form::radio('available',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-sm btn-primary">
                {!! Form::radio('available',0, null, ['class' => 'form-control'] ) !!} Retired
              </label>

              <label class="btn btn-sm btn-primary">
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
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>    
    </div>
    {!! Form::close() !!}

@endsection
