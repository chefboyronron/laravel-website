@extends('templates.content')

@section('title', 'Blade Elements')

@section('content')
    <h3>Comment</h3>
    {{-- Calling variable from controller --}}

    <h3>Variable</h3>
    {{$data['firstname']}}

    <h3>Without escaping variable</h3>
    Output: {!! $data['title'] !!} {{-- Commented out due to unautorize tag included on the string --}}

    <h3>Escaped variable</h3>
    Output: {{ $data['title'] }} {{-- unauthorize tag read as string literals --}}

    <h3>Blade and Javascript frameworks</h3>
    Example 1: Hello, @{{ $data['firstname'] }}

    <h3>JSON</h3>
    {{ json_encode($data) }}
    <script>
        var json = @json($data);
        console.log(json);
    </script>

    <h3>If statement</h3>
    @if ($data['is_active'] === 1)
        active
    @elseif ($data['is_active'] === 0)
        inactive
    @else
        on progress
    @endif

    <h3>Isset</h3>
    @isset ($data['is_active'])
        is_active flag is set
    @endisset

    <h3>Check if variable is not set = !isset(variable)</h3>
    @empty ($data['not_set'])
        not_set is not defined
    @endempty

    <h3>Switch statement</h3>
    @switch($data['is_active'])
        @case(0)
            Inactive
            @break
        @case(1)
            Active
            @break
        @default
            On progress
    @endswitch

    <h3>For loop</h3>
    @for($i = 0; $i < count($data['attendees']); $i++)
        {{ $data['attendees'][$i]['name'] }}
    @endfor

    <h3>Foreach loop</h3>
    @foreach( $data['attendees'] as $key => $user )
        Name: {{ $user['name'] }} <br>
        Gender: {{ $user['gender'] }}
        <hr>
    @endforeach

    <h3>While loop</h3>
    @@while($data['is_active'])
        looping forever
    @@endwhile

    <h3>Loop variables</h3>
    @foreach( $data['attendees'] as $key => $user )
        {{-- first element in the loop --}}
        @if( $loop->first )
            I am the first on the list, {{ jsoN_encode($user) }}
            <br>
        @endif
        {{ $loop->index }}
    @endforeach

    <h3>Generating csrf token</h3>
    <form method="POST" action="/profile">
        Form with csrf here
        @csrf
    </form>

    <h3>Method field</h3>
    <form action="/blade/data_receiver" method="POST">
        Method field
        @csrf
        @method('POST')
        <input type="submit" value="submit">
    </form>

@endsection