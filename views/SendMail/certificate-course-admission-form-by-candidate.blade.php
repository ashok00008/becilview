<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2b8910c3ac.js" crossorigin="anonymous"></script> -->

</head>

<body>

    <div class="fluid-container" style="margin: 20px 10px; max-width: 550px; margin:auto ;">
        <div class="">
            <div class="container-fluid">
                <div class="img-1">
                    <img src="https://beciljobs.com/assets/public/asset/img/becil-header.png" style="max-width: 550px;" class="logo1" >
                </div>
            </div>
        </div><br><br><br>
        <div class="container"  style="padding: 0px 10px;">
            <h5>Dear {{ $name }},<br>

            <h5>Please fill the required form given below.</h5>
            <a href="{{ env('APP_URL') }}/admission/{{$reg_id}}/create">Click here</a>


            <h5>BECIL Program Manager will co-ordinate with you shortly.</h5>
            <h5>Note: For more details, Please visit centre.</h5>


        </div><br><br><br>

        <div class="">
            <div class="container-fluid">
                <div class="img-1">
                    <img src="https://beciljobs.com/assets/public/asset/img/{{ $footer }}" style="max-width: 550px;" class="logo1" >
                </div>
            </div>
        </div>
    </div>

</body>

</html>
