<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - {{config('app.name')}}</title>

    <meta http-equiv="X-UA-Compatible" content=="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/fonts/line-awesome/css/line-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/fonts/open-sans/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/tether/css/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/common.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/pages/auth.min.css')}}">
</head>
<body>

<div class="ks-page">
    <div class="ks-header">
        <a href="#" class="ks-logo"><img src="{{asset('user/assets/img/logos/logo-4-blue.png')}}"></a>
    </div>
    <div class="ks-body">
        <div class="ks-logo">FUTURE CITY SUMMIT</div>

        <div class="card panel panel-default ks-light ks-panel ks-login">
            <div class="card-block">
                <form class="form-container" action="" method="post" id="loginform">
                    <h4 class="ks-header">Login</h4>
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            <span class="icon-addon">
                                <span class="la la-at"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="text" class="form-control" placeholder="Password" name="pw">
                            <span class="icon-addon">
                                <span class="la la-key"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <div class="ks-text-center">
                        <a href="#">Forgot your password?</a>
                    </div>

                    <div class="ks-social">
                        <div>or Log In with social</div>
                        <div>
                            <a href="#" class="facebook la la-facebook"></a>
                            <a href="#" class="twitter la la-twitter"></a>
                            <a href="#" class="google la la-google"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ks-footer">
        <span class="ks-copyright">&copy; 2018 FCS</span>
        <ul>
            <li>
                <a href="#">Privacy Policy</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div>
</div>

<script src="{{asset('user/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('user/libs/tether/js/tether.min.js')}}"></script>
<script src="{{asset('user/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
</body>

<script type="text/javascript">
var loginform = $('#loginform');

loginform.validate({
    onsubmit:true,
    errorElement: 'span', //default input error message container
    errorClass: 'help-block help-block-error', // default input error message class
    focusInvalid: false, // do not focus the last invalid input
    ignore: "",  // validate all fields including form hidden input
    rules: {
        email: {
            required: true,
            email: true
        },
        pw: {
            required: true
        }
    },
    errorPlacement: function (error, element) { // render error placement for each input type
        var cont = $(element).parent('.div');
        if (cont) {
            cont.after(error);
        } else {
            element.after(error);
        }
    },

    highlight: function (element) { // hightlight error inputs
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
    },

    unhighlight: function (element) { // revert the change done by hightlight
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set error class to the control group
    },

    success: function (label) {
        label.closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
    },

    submitHandler: function (form) {
        form.submit();
    }
});




</script>
</html>