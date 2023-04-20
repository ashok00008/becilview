<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <link rel="icon" href="favicon.png" type="image/png">
    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Open+Sans:300,400,700', 'Bree Serif:300,400,500,700,900']
            }
        });
    </script>

    <!-- css -->

    <link href="{{asset('assets/public/asset/css/bootstrap-responsive.css')}}" rel="stylesheet"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
<div id="app">
    <div id="wrapper">
        <!-- start header -->
        <div class="hidden-top">
            <div class="hidden-top-inner container">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <img src="{{asset('assets/public/asset/img/becil_logo.png')}}" class="logo1">
                    </div>
                    <div class="col-sm-5 col-6">
                        <img src="{{asset('assets/public/asset/img/naukariyaan.png')}}" class="logo2">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end header -->
    {{--Vue Routing--}}

    <home-main></home-main>


</div>
</div>
</body>

<script src="{{asset('js/app.js')}}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js" defer></script>

<script>


    $(function () {

        $("input").focus(function () {
            $(this).prev("label").hide(); //hide label of clicked item
        }).blur(function () {
            $(this).prev("label").show();
        });

    });

    $(function () {
        setTimeout(function () {
            $("#hideDiv").slideUp(1500);
        }, 5000)

    })
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {

        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {

            if ($this.val() === '') {
                label.removeClass('highlight');
            } else if ($this.val() !== '') {
                label.addClass('highlight');
            }
        }

    });


</script>
{{-- <script>
    var options = {
        "key": "rzp_test_DGvNV8jeSMT2sQ",
        "amount": "2000", // 2000 paise = INR 20
        "name": "Hello Verma",
        "description": "Purchase Description",
        "image": "/your_logo.png",
        "handler": function (response) {
            alert(response.razorpay_payment_id);
        },
        "prefill": {
            "name": "Gaurav Kumar",
            "email": "test@test.com"
        },
        "notes": {
            "address": "Hello World"
        },
        "theme": {
            "color": "#F37254"
        }
    };
    var rzp1 = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function (e) {
        rzp1.open();
        e.preventDefault();
    }

</script> --}}
</body>
</html>
