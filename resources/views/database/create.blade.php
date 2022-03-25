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

<form action="{{ url('/database') }}" method="POST">
    @csrf
    @method('post')
    <input type="text" name="name" value="">
    <select name="is_active" id="is_active">
        @foreach ($isActiveOptions as $key => $isActiveOption)
            <option value="{{ $key }}">{{ $isActiveOption }}</option>
        @endforeach
    </select>
    <input type="submit" name="submit" value="Add">
</form>