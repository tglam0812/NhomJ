<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #1a73e8;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input:focus {
            outline: none;
            border-color: #1a73e8;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #1557b0;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đổi Mật Khẩu</h2>
        <div class="form-group">
            <label for="current-password">Mật khẩu hiện tại</label>
            <input type="password" id="current-password" placeholder="Nhập mật khẩu hiện tại">
        </div>
        <div class="form-group">
            <label for="new-password">Mật khẩu mới</label>
            <input type="password" id="new-password" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="form-group">
            <label for="confirm-password">Xác nhận mật khẩu mới</label>
            <input type="password" id="confirm-password" placeholder="Xác nhận mật khẩu mới">
        </div>
        <div class="error" id="error-message"></div>
        <button onclick="changePassword()">Đổi Mật Khẩu</button>
    </div>

    <script>
        function changePassword() {
            const currentPassword = document.getElementById('current-password').value;
            const newPassword = document.getElementById('new-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const errorMessage = document.getElementById('error-message');

            errorMessage.style.display = 'none';
            errorMessage.textContent = '';

            if (!currentPassword || !newPassword || !confirmPassword) {
                errorMessage.textContent = 'Vui lòng điền đầy đủ các trường.';
                errorMessage.style.display = 'block';
                return;
            }

            if (newPassword !== confirmPassword) {
                errorMessage.textContent = 'Mật khẩu mới và xác nhận mật khẩu không khớp.';
                errorMessage.style.display = 'block';
                return;
            }

            if (newPassword.length < 6) {
                errorMessage.textContent = 'Mật khẩu mới phải có ít nhất 6 ký tự.';
                errorMessage.style.display = 'block';
                return;
            }

            // Logic gửi yêu cầu đổi mật khẩu tới server (giả lập)
            console.log('Đổi mật khẩu thành công!');
            alert('Mật khẩu đã được thay đổi thành công!');
            document.getElementById('current-password').value = '';
            document.getElementById('new-password').value = '';
            document.getElementById('confirm-password').value = '';
        }
    </script>
</body>
</html>