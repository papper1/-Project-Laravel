<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
</head>
<body>

<h2>Đăng ký tài khoản</h2>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/register">
    @csrf

    <div>
        <label>Tên</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <label>Mật khẩu</label>
        <input type="password" name="password">
    </div>

    <div>
        <label>Nhập lại mật khẩu</label>
        <input type="password" name="password_confirmation">
    </div>

    <button type="submit">Đăng ký</button>
</form>

</body>
</html>
