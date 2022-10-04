<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/6e89b7571b.js" crossorigin="anonymous"></script>
    <title>{{ __('panel.site_title') }}</title>
    <style>
        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            display: initial;
        }

        .login-form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon-eye {
            position: absolute;
            right: 10px;
            top: 70%;
            cursor: pointer;
            transform: translateY(-50%);
        }

        .button {
            background: linear-gradient(-45deg, #FDC727, #E60060, #0A9594, #004B9A);
            background-size: 800% 400%;
            display: inline-block;
            border: none;
            border-radius: 10px;
            font-size: 20px;
            font-weight: 700;
            color: white;
            transition: all .5s ease-in-out;
            animation: gradient 10s infinite cubic-bezier(.62, .28, .23, .99) both;
        }

        .button:hover {
            animation: gradient 3s infinite;
            transform: scale(1.05);
        }

        .button:active {
            animation: gradient 3s infinite;
            transform: scale(0.8);
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        #video {
            position: fixed;
            z-index: -1;
            object-fit: cover;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }
    </style>
</head>

<body>
    <video autoplay muted loop id="video">
        <source src="assets/video/coverbg.mp4" type="video/mp4">
    </video>
    <main>
        @yield('content')
    </main>

</body>
<script>
    let ver = document.getElementById("ver");
    let clave = document.getElementById("clave")
    let icono = document.getElementById("icono")
    let con = true

    ver.addEventListener("click", function() {
        if (con == true) {
            clave.type = "text"
            icono.classList.add("fa-eye-slash")
            con = false
        } else {
            clave.type = "password"
            icono.classList.remove("fa-eye-slash")
            con = true
        }
    })
</script>

</html>
