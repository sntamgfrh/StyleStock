<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StyleStock</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #FAF7F2;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #292524;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(41, 37, 36, 0.10);
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand h1 {
            font-size: 30px;
            color: #292524;
            margin-bottom: 8px;
        }

        .brand h1 span {
            color: #F97316;
        }

        .brand p {
            color: #78716c;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d6d3d1;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #F97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.12);
        }

        .login-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #F97316;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-button:hover {
            background: #ea580c;
        }

        .error-message {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .success-message {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #a8a29e;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="brand">
            <h1>Style<span>Stock</span></h1>
            <p>Inventory Management System</p>
        </div>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->has('login'))
            <div class="error-message">
                {{ $errors->first('login') }}
            </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Masukkan username"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="login-button">
                Login
            </button>
        </form>

        <div class="footer">
            StyleStock &copy; {{ date('Y') }}. All Rights Reserved.
        </div>

    </div>

</body>
</html>
