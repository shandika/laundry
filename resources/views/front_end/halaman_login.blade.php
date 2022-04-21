<html>
<head>
  <meta charset="utf-8">
  <title>CLEAN YOURS: Sign in</title>
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/laundry.png') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front-end/assets/css/stylelogin.css') }}">
  <link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="{{ route('depan') }}" rel="dofollow">CLEAN YOURS</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
                <div class="text-center mb-5">
                    @if($message = Session::get('gagal_login'))
                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 15px; margin-bottom: -20px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> <strong>Peringatan!</strong> {{ $message }}</div>
                    @endif
                </div>
              <span class="padding-bottom--15">Sign in to your account</span>
              <form method="POST" action="{{ url('/login_verifikasi') }}" id="stripe-login" name="form_login">
                  @csrf
                <div class="field padding-bottom--24">
                  <label for="email">Username</label>
                  <input type="text" name="username">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                    <div class="reset-pass">
                      <a href="{{ url('/lupa_password') }}">Forgot your password?</a>
                    </div>
                  </div>
                  <input type="password" name="password">
                </div>       
                <div class="field padding-bottom--24">
                <button class="btn login-form__btn submit w-100">Continue</button>
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a id="regis" href="{{ route('registrasi') }}">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">© Stackfindover</a></span>
              <span><a href="#">Contact</a></span>
              <span><a href="#">Privacy & terms</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('front-end/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/common/common.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/gleek.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>
<script src="{{ asset('js/jquery.form-validator.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $( document ).on( 'focus', ':input', function(){
            $( this ).attr( 'autocomplete', 'off' );
        });
    });
    
    $(function() {
        $("form[name='form_register']").validate({
        rules: {
            nama: "required",
            username: {
            required: true,
            minlength: 3
            },
            password: {
            required: true,
            minlength: 5
            }
        },
        messages: {
            nama: "<span style='color: red;'>Nama tidak boleh kosong</span>",
            username: "<span style='color: red;'>Username tidak boleh kosong</span>",
            password: "<span style='color: red;'>Password tidak boleh kosong</span>"
        },
        submitHandler: function(form) {
            form.submit();
        }
        });
    });

    $(function() {
        $("form[name='form_login']").validate({
        rules: {
            username: {
            required: true,
            minlength: 3
            },
            password: {
            required: true,
            minlength: 5
            }
        },
        messages: {
            username: "<span style='color: red;'>Username tidak boleh kosong</span>",
            password: "<span style='color: red;'>Password tidak boleh kosong</span>"
        },
        submitHandler: function(form) {
            form.submit();
        }
        });
    });

    $('.avatar-input').change(function() {
        $(this).next('label').text($(this).val());
    });

    @if ($message = Session::get('tersimpan'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    )
    @endif

    @if ($message = Session::get('terubah'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    )
    @endif
</script>
</body>

</html>
