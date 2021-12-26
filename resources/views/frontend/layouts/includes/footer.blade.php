
<!-- Flash Message -->
@include('errors.flash_message')

<!-- Login script -->
@section('script')
    @if( env('APP_ENV') == 'production' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
        {{ view_html(NoCaptcha::renderJs()) }}
    @endif
@endsection

<!-- jQuery -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Template script -->
<script src="{{ asset('frontend/assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('vendor/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/cvalidator.min.js') }}"></script>

<script>
    $(document).ready(function () {

        // Login ajax
        $("#loginAlert, #txt_uname_alert, #txt_pwd_alert").hide()
        $("#but_submit").on("click", function (event) {
            event.preventDefault()

            // reset alert
            $(".login-alert").text('');
            $(".login-alert").hide();

            var username = $("#txt_uname").val()
            var password = $("#txt_pwd").val()

            axios.post("{{route('user-login')}}", {
                username: username,
                password: password,
            })
            .then(function (response) {
                if(response.data.loginResponse.status == true)
                {
                    location.reload()
                } else
                {
                    $("#loginAlert").text(response.data.loginResponse.message)
                    $("#loginAlert").show()
                }

            })
            .catch(function (error) {
                jQuery.each( error.response.data.errors, function( i, val ) {
                    var selector = $("#" + i +"_alert");

                    selector.text(val[0])
                    selector.show()

                });
            });
        })

        // Register ajax
        $("#registerAlert, #last_name_alert, #first_name_alert, #username_alert, #email_alert, #password_alert, #password_confirmation_alert").hide()
        $("#reg_submit").on("click", function (event) {
            event.preventDefault()

            // reset alert
            $(".login-alert").text('');
            $(".login-alert").hide();

            var first_name = $("#first_name").val()
            var last_name = $("#last_name").val()
            var reg_username = $("#reg-username").val()
            var email = $("#reg-email").val()
            var password = $("#reg-password").val()
            var password_confirmation = $("#reg-password_confirmation").val()
            var check_agreement = $("#agreement").val()

            axios.post("{{route('register.store')}}", {
                first_name: first_name,
                last_name: last_name,
                username: reg_username,
                email: email,
                password: password,
                password_confirmation: password_confirmation,
                check_agreement: check_agreement,
            })
            .then(function (response) {
                if(response.data.regResponse.status == true)
                {
                    location.reload()
                } else
                {
                    $("#registerAlert").text(response.data.regResponse.message)
                    $("#registerAlert").show()
                }

            })
            .catch(function (error) {

                jQuery.each( error.response.data.errors, function( i, val ) {
                    var selector = $("#" + i +"_alert");

                    selector.text(val[0])
                    selector.show()

                });
            });
        })
    })

</script>

<script>
    $(document).ready(function () {
        $('.cvalidate').cValidate();
    })
</script>

<!-- REQUIRED SCRIPTS -->
@yield('script')
</body>
</html>
