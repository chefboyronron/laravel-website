@include('database.menu')
<style>
    /* Embed style for study purposes, will convert to sass in the future. */
    body {
        font-family:'Times New Roman', Times, serif;
    }
    .active {
        color: green;
    }
    .inactive {
        color: red;
    }
    .text-only {
        background: none;
        border: 0;
        cursor: pointer;
        text-decoration: underline;
        padding: 0;
    }
    a {
        color: #000;
    }
    .delete_form{
        margin:0;
    }
</style>
<table border="1" style="margin-bottom:20px;">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Status</td>
            <td>Created At</td>
            <td>Update At</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($channels as $channel)
            @php
                $is_active = $channel->is_active === 0 ? 'Inactive' : 'Active'
            @endphp
            <tr>
                <td>{{ $channel->id }}</td>
                <td>{{ $channel->name }}</td>
                <td class="{{ $is_active }}">{{ $is_active }}</td>
                <td>{{ date('F d, Y g:i A', strtotime($channel->created_at)) }}</td>
                <td>{{ date('F d, Y g:i A', strtotime($channel->updated_at)) }}</td>
                <td colspan="2">
                    {!! Form::open(['url'=>'/database/' . $channel->id, 'method' => 'delete', 'class' => 'delete_form']) !!}
                        <a href="{{ url('/database/' . $channel->id . '/edit') }}">Edit</a> | 
                        {!! Form::submit('Delete', ['class'=>'text-only']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $channels->links() }}
<a href="{{ $channels->previousPageUrl()}}">Previous</a>
<a href="{{ $channels->nextPageUrl() }}">Next</a>