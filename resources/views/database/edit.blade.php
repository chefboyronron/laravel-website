@include('database.menu')

{{-- <form action="{{ url('/database/update') }}" method="POST">
    @csrf
    @method('put')
    @foreach ($record as $item)
        <input type="hidden" name="id" value="{{ $item->id }}">
        <input type="text" name="name" value="{{ $item->name ?? '' }}">
        <select name="is_active" id="is_active">
            @foreach ($statuses as $key => $isActiveOption)
                <option value="{{ $key }}" {{ ($key === $item->is_active) ? 'selected' : '' }}>{{ $isActiveOption }}</option>
            @endforeach
        </select>
    @endforeach
    <input type="submit" name="submit" value="Edit">
</form> --}}

{!! Form::open(['url' => '/database/update', 'method' => 'PUT']) !!}
    @foreach ($record as $item)
        {{-- @csrf added authomatically on laravel collective html --}}
        {!! Form::hidden('id', $item->id) !!}
        {!! Form::text('name', $item->name) !!}
        {!! Form::select('is_active', $statuses, $activeOption) !!}
    @endforeach
    {!! Form::submit('Update') !!}
{!! Form::close() !!}