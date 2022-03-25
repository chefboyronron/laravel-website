@include('database.menu')

@if ( $error_message !== '' )
    <div style="background: #f00; color: #fff; margin-bottom: 10px; width: 300px; text-align:center;">{{ $error_message }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['url' => '/database', 'method' => 'POST']) !!}
    {{-- @csrf added authomatically on laravel collective html --}}
    {!! Form::text('name') !!}
    {!! Form::select('is_active', $isActiveOptions) !!}
    {!! Form::submit('Add') !!}
{!! Form::close() !!}