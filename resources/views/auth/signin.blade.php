<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
</head>
<body>

<h2>Đăng ký tài khoản</h2>

<form method="POST" action="/signin">
    @csrf

    <div>
        Username:
        <input type="text" name="username">
    </div>

    <div>
        Password:
        <input type="password" name="password">
    </div>

    <div>
        Re-Password:
        <input type="password" name="repass">
    </div>

    <div>
        MSSV:
        <input type="text" name="mssv">
    </div>

    <div>
        Lớp môn học:
        <input type="text" name="lopmonhoc">
    </div>

    <div>
        Giới tính:
        <select name="gioitinh">
            <option value="nam">Nam</option>
            <option value="nu">Nữ</option>
        </select>
    </div>

    <button type="submit">Sign In</button>
</form>

</body>
</html>
