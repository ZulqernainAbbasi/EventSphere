<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Collaborative AI Study Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/CSS/signup.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <div class="form-column">
                <h2 class="auth-title">Register to ES</h2>
                <p class="auth-subtitle">Create an account to collaborate</p>
                <form action="../Logic/formHandler.php" method="POST" enctype="multipart/form-data" id="signupForm">
                    <!-- Left Column -->
                    <div class="form-column">
                        <!-- Full Name -->
                        <div class="form-floating">
                            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Your full name" required>
                            <label for="fullname">Full Name</label>
                        </div>

                        <!-- Email -->
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="email" placeholder="example@domain.com" required>
                            <label for="email">Email Address</label>
                            <div class="error-message" id="emailError">Please enter a valid email address</div>
                        </div>

                        <!-- Password -->
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Create a password" required>
                            <label for="password">Password</label>
                            <div class="password-strength" id="passwordStrength"></div>
                            <div class="error-message" id="passwordError">Password must be at least 8 characters</div>
                        </div>
                    </div>
            </div>
            <div class="form-column">
                    <!-- Right Column -->
                    <!-- Confirm Password -->
                    <div class="form-floating">
                        <input type="password" name="confirm_password" class="form-control" id="confirmPassword" placeholder="Confirm your password" required>
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="error-message" id="confirmPasswordError">Passwords do not match</div>
                    </div>

                    <!-- Role -->
                    <div class="form-floating">
                        <select name="role" class="form-select" id="role" required>
                            <option value="">Select role</option>
                            <option value="Participant">Participant</option>
                            <option value="Organizer">Organizer</option>
                        </select>
                    </div>

                    <!-- Profile Picture -->
                    <div class="form-floating">
                        <input type="file" name="profile_pic" class="form-control" id="profilePic" accept="image/*">
                        <label for="profilePic">Profile Picture (optional)</label>
                    </div>

                    <!-- Bio -->
                    <div class="form-floating">
                        <textarea name="bio" class="form-control" id="bio" placeholder="Tell others about yourself..."></textarea>
                        <label for="bio">Short Bio (optional)</label>
                    </div>

                    <!-- Submit Button -->
                    <input type="submit" name="signup" class="btn-hero w-100" id="submitButton" value="Create Account">

                    <p class="auth-footer">
                        Have an account? <a href="login.php">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            const errorMessage = document.getElementById('passwordError');
            const confirmPassword = document.getElementById('confirmPassword');

            if (password.length < 8) {
                strengthBar.className = 'password-strength weak';
                this.classList.add('is-invalid');
                errorMessage.style.display = 'block';
            } else if (password.length < 12) {
                strengthBar.className = 'password-strength medium';
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                errorMessage.style.display = 'none';
            } else {
                strengthBar.className = 'password-strength strong';
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                errorMessage.style.display = 'none';
            }

            if (confirmPassword.value && confirmPassword.value !== password) {
                confirmPassword.classList.add('is-invalid');
                document.getElementById('confirmPasswordError').style.display = 'block';
            } else {
                confirmPassword.classList.remove('is-invalid');
                confirmPassword.classList.add('is-valid');
                document.getElementById('confirmPasswordError').style.display = 'none';
            }
        });

        document.getElementById('confirmPassword').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('confirmPasswordError');

            if (this.value !== password) {
                this.classList.add('is-invalid');
                errorMessage.style.display = 'block';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                errorMessage.style.display = 'none';
            }
        });

        document.getElementById('email').addEventListener('input', function() {
            const email = this.value;
            const errorMessage = document.getElementById('emailError');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                this.classList.add('is-invalid');
                errorMessage.style.display = 'block';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                errorMessage.style.display = 'none';
            }
        });
    </script>
</body>
</html>