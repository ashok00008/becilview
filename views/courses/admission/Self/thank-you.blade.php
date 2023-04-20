<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

    <link href="{{ asset('assets/public/asset/css/bootstrap-responsive.css') }}" rel="stylesheet" />

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
                            <img src="{{ asset('assets/public/asset/img/becil_logo.png') }}" class="logo1">
                        </div>
                        <div class="col-sm-5 col-6">
                            <img src="{{ asset('assets/public/asset/img/naukariyaan.png') }}" class="logo2">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding: 0px 10px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">

                        <div class="container col-sm-12">

                            <h2>Thank You!</h2>



                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>
