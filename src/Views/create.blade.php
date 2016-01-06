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
              <label class="btn btn-primary">
                {!! Form::radio('convertible',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-primary">
                {!! Form::radio('convertible',0, null, ['class' => 'form-control'] ) !!} No
              </label>
            </div>
          <div class="help-block">Can be converted into other currencies?</div>  
        </div>      
        {!! $errors->first('convertible', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('tradeable', 'Tradeable: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary">
                {!! Form::radio('tradeable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-primary">
                {!! Form::radio('tradeable',0, null, ['class' => 'form-control'] ) !!} No
              </label>
            </div>
          <div class="help-block">Can be traded amongst users?</div>  
        </div>      
        {!! $errors->first('tradeable', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('sellable', 'Sellable: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary">
                {!! Form::radio('sellable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-primary">
                {!! Form::radio('sellable',0, null, ['class' => 'form-control'] ) !!} No
              </label>
            </div>
          <div class="help-block">Can be sold amongst users?</div>  
        </div>      
        {!! $errors->first('sellable', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('rewardable', 'Rewardable: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary">
                {!! Form::radio('rewardable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-primary">
                {!! Form::radio('rewardable',0, null, ['class' => 'form-control'] ) !!} No
              </label>
            </div>
          <div class="help-block">Can be given as a reward?</div>  
        </div>      
        {!! $errors->first('rewardable', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('discoverable', 'Discoverable: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary">
                {!! Form::radio('discoverable',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-primary">
                {!! Form::radio('discoverable',0, null, ['class' => 'form-control'] ) !!} No
              </label>
            </div>
          <div class="help-block">Can be discovered("found") by users with some sort of loot/search function(s)?</div>  
        </div>      
        {!! $errors->first('discoverable', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('itemize', 'Itemize: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary">
                {!! Form::radio('itemize',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-primary">
                {!! Form::radio('itemize',0, null, ['class' => 'form-control'] ) !!} No
              </label>
            </div>
          <div class="help-block">Can be itemized in your "stores"? <em>(can prevent others from making it available for "sale" by accident in official "stores")</em></div>  
        </div>      
        {!! $errors->first('itemize', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('available', 'Available: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary">
                {!! Form::radio('available',1, null, ['class' => 'form-control'] ) !!} Yes
              </label>

              <label class="btn btn-primary">
                {!! Form::radio('available',0, null, ['class' => 'form-control'] ) !!} Retired
              </label>

              <label class="btn btn-primary">
                {!! Form::radio('available',2, null, ['class' => 'form-control'] ) !!} Devalued
              </label>
            </div>
          <div class="help-block">Is it still available?</div>  
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

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection