<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Travel CRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>

<body>

    <div class="auth-wrapper">
        {{-- LEFT SIDE --}}
        <div class="auth-left">
            <img src="{{ asset('assets/images/login.png') }}" class="illustration" alt="CRM Illustration">
        </div>

        {{-- RIGHT SIDE --}}
        <div class="auth-right">
            <div class="auth-card">
                <h2>VOYEX CRM</h2>
                <p class="mb-3"><i>Smart Travel CRM Platform</i></p>
                <h3>Sign in</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address"
                            required autofocus>
                    </div>

                    <div class="form-group password-wrapper">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Password"
                            required
                        >
                        <i class="fa fa-eye toggle-password" id="togglePassword"></i>
                    </div>

                    <div class="form-group remember">
                        <label class="remember">
                            <input type="checkbox" name="remember">
                            <span class="remember__text">Remember me</span>
                        </label>
                    </div>

                    <button type="submit" class="btn-primary">
                        Sign In
                    </button>
                </form>

                <p class="footer-text">VOYEX CRM © 2026. All rights reserved.</p>
                {{-- <p class="footer-text">
                    Don't have an account?
                    <a href="{{ route('register') }}">Sign up</a>
                </p> --}}
            </div>
        </div>

    </div>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>

</body>

</html>