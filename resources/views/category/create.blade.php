@extends('adminlte::page')

@section('content')
<form method="POST" action="{{ route('category.store') }}">
@csrf

<input type="text" name="name" placeholder="Tên" class="form-control mb-2">

<select name="parent_id" class="form-control mb-2">
    <option value="">-- Danh mục cha --</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select>

<button class="btn btn-success">Lưu</button>
</form>
@stop
