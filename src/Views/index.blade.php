@extends( config('lex.layout') )

@section( config('lex.section') )

    <h1><i class="fa fa-money fa-fw"></i> {{ config('lex.title', 'Lex Currency') }}
    <div class="btn-group pull-right" role="group" aria-label="..."> 
      
        <a href="{{ route('lex.create') }}">
        <button type="button" class="btn btn-info">
          <i class="fa fa-plus fa-fw"></i> 
          <span class="hidden-xs hidden-sm">Add New Currency</span>
        </button></a>
      
    </div>
    </h1>

    <div class="table">
        <table class="table table-hover">
        <caption>
          Your base value is your lowest, available currency unless specifically specified below with this icon <i class="fa fa-lg fa-money text-success" title="Identified as base currency"></i>.
        </caption>
            <thead>
                <tr>
                    <th>Name</th><th class="hidden-xs hidden-sm">Base Value</th><th>Actions</th>
                </tr>
            </thead>

            <tbody>
              @forelse($currencies as $item)
               <tr>
                <td>{{ $item->name }}
                @if ($item->slug == 'base')
                      <i class="fa fa-lg fa-money text-success" title="Identified as base currency"></i> 
                @endif
                </td>
                
                <td class="hidden-xs hidden-sm">
                    {{ $item->base_value }}
                </td>
                
                <td>
                    <a href="{{ route('lex.show', $item->id) }}">
                      <button type="button" class="btn btn-primary btn-xs">
                      <i class="fa fa-search fa-fw"></i> 
                      <span class="hidden-xs hidden-sm">View</span>
                      </button></a>

                    <a href="{{ route('lex.edit', $item->id) }}">
                      <button type="button" class="btn btn-default btn-xs">
                      <i class="fa fa-pencil fa-fw"></i> 
                      <span class="hidden-xs hidden-sm">Edit</span>
                      </button></a>

                    {!! Form::open(['method'=>'delete','route'=> ['lex.destroy',$item->id], 'style' => 'display:inline']) !!}
                      <button type="submit" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash-o fa-lg"></i> 
                      <span class="hidden-xs hidden-sm">Delete</span>
                      </button>
                    {!! Form::close() !!}
                </td>

               </tr>
              @empty
                <tr><td>There are no currencies</td></tr>
              @endforelse

              <!-- pagination -->
              <tfoot>
                <tr>
                 <td colspan="3" class="text-center small">
                  {!! $currencies->render() !!}
                 </td>
                </tr>
              </tfoot>
            </tbody>
        </table>
    </div>

@endsection