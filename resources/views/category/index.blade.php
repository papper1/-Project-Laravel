@extends('adminlte::page')

@section('content')
<a href="{{ route('category.create') }}" class="btn btn-primary">Thêm mới</a>

<table class="table mt-3">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Parent</th>
        <th>Action</th>
    </tr>

    @foreach($categories as $cat)
    <tr>
        <td>{{ $cat->id }}</td>
        <td>{{ $cat->name }}</td>
        <td>{{ optional($cat->parent)->name }}</td>
        <td>
            <a href="{{ route('category.edit',$cat->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('category.destroy',$cat->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@stop
