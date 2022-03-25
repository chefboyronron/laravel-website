@include('database.menu')

<form action="{{ url('/database/update') }}" method="POST">
    @csrf
    @method('put')
    @foreach ($record as $item)
        <input type="hidden" name="id" value="{{ $item->id }}">
        <input type="text" name="name" value="{{ $item->name ?? '' }}">
        <select name="is_active" id="is_active">
            @foreach ($isActiveOptions as $key => $isActiveOption)
                <option value="{{ $key }}" {{ ($key === $item->is_active) ? 'selected' : '' }}>{{ $isActiveOption }}</option>
            @endforeach
        </select>
    @endforeach
    <input type="submit" name="submit" value="Edit">
</form>