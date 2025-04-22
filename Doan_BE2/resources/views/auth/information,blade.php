<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Cập Nhật Tài Khoản</title>
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(124, 58, 237, 0.3));
            z-index: 1;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 4rem;
            width: 100%;
            max-width: 650px;
            position: relative;
            z-index: 2;
            animation: slideIn 0.6s ease-out;
        }
        .form-container:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.4);
        }
        .form-title {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 3.5rem;
            background: linear-gradient(90deg, #7c3aed, #f59e0b);
            -webkit-background-clip: text;
            color: transparent;
        }
        .form-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 5px;
            background: linear-gradient(90deg, #7c3aed, #f59e0b);
            margin: 0.75rem auto;
            border-radius: 3px;
        }
        .form-group {
            margin-bottom: 2.25rem;
            position: relative;
            animation: fadeInField 0.8s ease-out;
            animation-delay: calc(0.1s * var(--i));
        }
        .form-group label {
            display: block;
            font-size: 1rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.75rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .form-group label:hover {
            color: #7c3aed;
            transform: transformX(5px);
        }
        .form-group input, .form-group input[type="file"] {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            background: #f9fafb;
            font-size: 1.1rem;
            color: #1f2937;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        }
        .form-group input:disabled {
            background: #e5e7eb;
            color: #6b7280;
            cursor: not-allowed;
            border-color: #d1d5db;
        }
        .form-group input:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 5px rgba(16, 185, 129, 0.2);
            transform: scale(1.02);
        }
        .form-group .icon {
            position: absolute;
            top: 50%;
            right: 1.5rem;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.3rem;
            transition: color 0.3s ease;
        }
        .form-group:hover .icon {
            color: #f59e0b;
        }
        .action-buttons {
            display: flex;
            gap: 1.5rem;
            margin-top: 3.5rem;
            justify-content: center;
        }
        .btn {
            flex: 1;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            text-align: center;
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            max-width: 200px;
        }
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }
        .btn:hover::before {
            left: 100%;
        }
        .btn-primary {
            background: linear-gradient(90deg, #7c3aed, #a855f7);
            color: white;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #6d28d9, #9333ea);
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.5);
        }
        .btn-secondary {
            background: linear-gradient(90deg, #f59e0b, #f97316);
            color: white;
        }
        .btn-secondary:hover {
            background: linear-gradient(90deg, #d97706, #ea580c);
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.5);
        }
        .profile-pic {
            display: flex;
            justify-content: center;
            margin-bottom: 2.5rem;
            position: relative;
        }
        .profile-pic img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 5px solid #7c3aed;
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            object-fit: cover;
        }
        .profile-pic img:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.5);
        }
        .profile-pic input[type="file"] {
            position: absolute;
            bottom: 0;
            right: 0;
            opacity: 0;
            width: 40px;
            height: 40px;
            cursor: pointer;
        }
        .profile-pic label {
            position: absolute;
            bottom: 0;
            right: 0;
            background: #10b981;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .profile-pic label:hover {
            background: #059669;
        }
        .error-text {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: none;
        }
        .error-text.show {
            display: block;
        }
        .success-message {
            background: #10b981;
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            text-align: center;
            display: none;
        }
        .success-message.show {
            display: block;
        }
        .tooltip {
            position: absolute;
            background: #1f2937;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.8rem;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(10px);
            pointer-events: none;
        }
        .form-group:hover .tooltip {
            opacity: 1;
            transform: translateY(0);
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInField {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @media (max-width: 640px) {
            .form-container {
                padding: 2.5rem;
                margin: 1.5rem;
            }
            .form-title {
                font-size: 2rem;
            }
            .action-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            .btn {
                max-width: none;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="profile-pic">
            <img id="avatar-preview" src="https://i.pravatar.cc/100" alt="Ảnh đại diện">
            <label for="avatar">📷</label>
            <input type="file" id="avatar" accept="image/*">
        </div>
        <h2 class="form-title">Thông Tin Tài Khoản</h2>
        <div class="success-message" id="success-message">
            Cập nhật thông tin thành công!
        </div>
        <form id="account-form">
            <div class="form-group" style="--i: 1">
                <label for="fullName">Họ và Tên</label>
                <input type="text" id="fullName" name="fullName" value="Nguyễn Văn A">
                <span class="tooltip" style="top: 100%; left: 0;">Tên đầy đủ của bạn</span>
                <span class="error-text" id="fullName-error">Họ và tên không được để trống</span>
            </div>
            <div class="form-group" style="--i: 2">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="nguyenvana@example.com">
                <span class="tooltip" style="top: 100%; left: 0;">Địa chỉ email liên hệ</span>
                <span class="error-text" id="email-error">Email không hợp lệ</span>
            </div>
            <div class="form-group" style="--i: 2">
                <label for="gender">Giới tính</label>
                <input type="gender" id="gednder" name="gender" value="nam">
                <span class="tooltip" style="top: 100%; left: 0;">Nhập giới tính</span>
                <span class="error-text" id="email-error">giới tính không hợp lệ</span>
            </div>
            <div class="form-group" style="--i: 3">
                <label for="phone">Số Điện Thoại</label>
                <input type="tel" id="phone" name="phone" value="0123456789">
                <span class="tooltip" style="top: 100%; left: 0;">Số điện thoại liên lạc</span>
                <span class="error-text" id="phone-error">Số điện thoại phải là 10 chữ số</span>
            </div>
            <div class="form-group" style="--i: 4">
                <label for="dateOfBirth">Ngày Sinh</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth" value="1990-01-01">
                <span class="tooltip" style="top: 100%; left: 0;">Ngày tháng năm sinh</span>
                <span class="error-text" id="dateOfBirth-error">Ngày sinh không được để trống</span>
            </div>
            <div class="form-group" style="--i: 5">
                <label for="password">Mật Khẩu</label>
                <input type="password" id="password" name="password">
                <span class="tooltip" style="top: 100%; left: 0;">Mật khẩu mới (ít nhất 6 ký tự)</span>
                <span class="error-text" id="password-error">Mật khẩu phải có ít nhất 6 ký tự</span>
            </div>
            <div class="form-group" style="--i: 6">
                <label for="confirmPassword">Xác Nhận Mật Khẩu</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
                <span class="tooltip" style="top: 100%; left: 0;">Nhập lại mật khẩu để xác nhận</span>
                <span class="error-text" id="confirmPassword-error">Mật khẩu xác nhận không khớp</span>
            </div>
            <div class="form-group" style="--i: 7">
                <label for="address">Địa Chỉ</label>
                <input type="text" id="address" name="address" value="123 Đường Láng, Hà Nội" disabled>
                <span class="tooltip" style="top: 100%; left: 0;">Địa chỉ hiện tại của bạn</span>
            </div>
            <div class="action-buttons">
                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                <button type="button" class="btn btn-secondary" onclick="resetForm()">Đặt Lại</button>
            </div>
        </form>
    </div>
    <script>
        const form = document.getElementById('account-form');
        const avatarInput = document.getElementById('avatar');
        const avatarPreview = document.getElementById('avatar-preview');
        const successMessage = document.getElementById('success-message');

        // Handle avatar upload
        avatarInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = () => {
                    avatarPreview.src = reader.result;
                    successMessage.classList.remove('show');
                };
                reader.readAsDataURL(file);
            } else {
                alert('Vui lòng chọn một file hình ảnh hợp lệ.');
                avatarInput.value = '';
            }
        });

        // Form validation and submission
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            let isValid = true;

            // Reset error messages
            document.querySelectorAll('.error-text').forEach(error => error.classList.remove('show'));
            successMessage.classList.remove('show');

            // Validate fullName
            const fullName = document.getElementById('fullName').value;
            if (!fullName.trim()) {
                document.getElementById('fullName-error').classList.add('show');
                isValid = false;
            }

            // Validate email
            const email = document.getElementById('email').value;
            if (!email.match(/^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
                document.getElementById('email-error').classList.add('show');
                isValid = false;
            }

            // Validate phone
            const phone = document.getElementById('phone').value;
            if (!phone.match(/^\d{10}$/)) {
                document.getElementById('phone-error').classList.add('show');
                isValid = false;
            }

            // Validate dateOfBirth
            const dateOfBirth = document.getElementById('dateOfBirth').value;
            if (!dateOfBirth) {
                document.getElementById('dateOfBirth-error').classList.add('show');
                isValid = false;
            }

            // Validate password
            const password = document.getElementById('password').value;
            if (password && password.length < 6) {
                document.getElementById('password-error').classList.add('show');
                isValid = false;
            }

            // Validate confirmPassword
            const confirmPassword = document.getElementById('confirmPassword').value;
            if (password && password !== confirmPassword) {
                document.getElementById('confirmPassword-error').classList.add('show');
                isValid = false;
            }

            if (isValid) {
                // Simulate saving data
                setTimeout(() => {
                    successMessage.classList.add('show');
                }, 500);
            }
        });

        // Reset form
        function resetForm() {
            form.reset();
            document.getElementById('fullName').value = 'Nguyễn Văn A';
            document.getElementById('email').value = 'nguyenvana@example.com';
            document.getElementById('phone').value = '0123456789';
            document.getElementById('dateOfBirth').value = '1990-01-01';
            document.getElementById('address').value = '123 Đường Láng, Hà Nội';
            avatarPreview.src = 'https://i.pravatar.cc/100';
            document.querySelectorAll('.error-text').forEach(error => error.classList.remove('show'));
            successMessage.classList.remove('show');
        }
    </script>
</body>
</html>