<!DOCTYPE html>
<html>
<head>
    <title>Register - To-Do List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f5f7fa;
            color: #2d3748;
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2d3748;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            letter-spacing: 0.5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #4a5568;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: 'Quicksand', sans-serif;
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #a0aec0;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
        }

        .submit-btn {
            width: 100%;
            background-color: #4299e1;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .submit-btn:hover {
            background-color: #3182ce;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        .login-link a {
            color: #4299e1;
            text-decoration: none;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background-color: #fed7d7;
            color: #c53030;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            letter-spacing: 0.3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Register</h2>
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>
            <form action="register_proses.php" method="post">
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>

                <button type="submit" class="submit-btn">Daftar</button>
            </form>
            <div class="login-link">
                Sudah punya akun? <a href="login.php">Login di sini</a>
            </div>
        </div>
    </div>
</body>
</html> 