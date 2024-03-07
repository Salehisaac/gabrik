
<link rel="stylesheet" href="{{ asset('css/login.css') }}">


<form action="{{route('login')}}" method="post">
    @csrf
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <form class="login">
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="text" name="email" class="login__input" placeholder="User name / Email">
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" name="password" class="login__input" placeholder="Password">
                </div>

                <button type="submit" class="button login__submit">
                    <span class="button__text" style="display: block">وارد شوید</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
                @error('email')
                <span class="error-message">
                        <strong>اطلاعات وارد شده صحیح نمی‌باشد</strong>
                </span>
                @enderror

            </form>
            <div class="social-login">
                <h3>gabrik</h3>
                <div class="social-icons">
                    <a href="#" class="social-login__icon fab fa-instagram"></a>
                    <a href="#" class="social-login__icon fab fa-facebook"></a>
                    <a href="#" class="social-login__icon fab fa-twitter"></a>
                </div>
            </div>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>

</form>
