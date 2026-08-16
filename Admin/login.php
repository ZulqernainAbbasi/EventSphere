<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Collaborative AI Study Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/CSS/login.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <h2 class="auth-title">Login to ES</h2>
            <p class="auth-subtitle">Access your account to collaborate</p>
            <form action="../Logic/adminLogic.php" method="POST" id="loginForm">
                <!-- Email -->
                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="email" placeholder="username" required>
                    <label for="email">Username</label>
                    <div class="error-message" id="emailError">Please enter a valid Username</div>
                </div>

                <!-- Password -->
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                    <label for="password">Password</label>
                    <div class="error-message" id="passwordError">Password is required</div>
                </div>

                <!-- Remember Me -->
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                    <label for="rememberMe" class="form-check-label">Remember Me</label>
                </div>

                <!-- Submit Button -->
                <input type="submit" class="btn-hero w-100" id="submitButton" name= "login" value="Login">

            </form>
        </div>
    </div>

    <script href="../Assets/JS/login.js"></script>
</body>
</html>