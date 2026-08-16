        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = true;
            submitButton.textContent = 'Logging in...';

            setTimeout(() => {
                submitButton.disabled = false;
                submitButton.textContent = 'Login';
            }, 2000);
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

        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const errorMessage = document.getElementById('passwordError');

            if (!password) {
                this.classList.add('is-invalid');
                errorMessage.style.display = 'block';
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                errorMessage.style.display = 'none';
            }
        });