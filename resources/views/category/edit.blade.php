@extends('adminlte::page')

@section('content')
<form method="POST" action="{{ route('category.update',$category->id) }}">
@csrf
@method('PUT')

<input type="text" name="name" value="{{ $category->name }}" class="form-control mb-2">

<select name="parent_id" class="form-control mb-2">
    <option value="">-- Danh mục cha --</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}"
            {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select>

<button class="btn btn-success">Cập nhật</button>
</form>
@stop
