<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html, body {
            position: absolute;
            width: 100%;
            height: 100vh;

            color: #fff;

            background: -moz-linear-gradient(320deg, rgba(104,46,182,1) 0%, rgba(89,39,156,1) 100%); /* ff3.6+ */
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0%, rgba(104,46,182,1)), color-stop(100%, rgba(89,39,156,1))); /* safari4+,chrome */
            background: -webkit-linear-gradient(320deg, rgba(104,46,182,1) 0%, rgba(89,39,156,1) 100%); /* safari5.1+,chrome10+ */
            background: -o-linear-gradient(320deg, rgba(104,46,182,1) 0%, rgba(89,39,156,1) 100%); /* opera 11.10+ */
            background: -ms-linear-gradient(320deg, rgba(104,46,182,1) 0%, rgba(89,39,156,1) 100%); /* ie10+ */
            background: linear-gradient(130deg, rgba(104,46,182,1) 0%, rgba(89,39,156,1) 100%); /* w3c */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#682EB6', endColorstr='#59279C',GradientType=1 ); /* ie6-9 */
        }

        ::-moz-selection {
            background: #682EB6;
        }

        ::selection {
            background: #682EB6;
        }

        h1 {
            margin-top: 10%;

            font-size: 6em;
        }

        h3 {
            margin-bottom: 75px;
        }

        input {
            background: none;
            border: none;
            font-size: 30px;
        }

        input[type="email"] {
            display: block;
            margin: auto;
            padding: 0 25px;
            background: #fff;
            color: #000;
            border-radius: 25px;

            outline: none;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 6px 40px;
            border-radius: 25px;

            outline: none;

            background-color: #97D149;

            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -ms-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
        }

        input[type="submit"]:hover {
            background-color: #77b149;
        }

        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.delay {
            -webkit-animation-delay: 1s;
            animation-delay: 1s;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        @-webkit-keyframes zoomIn {
            from {
                opacity: 0;
                -webkit-transform: scale3d(0.3, 0.3, 0.3);
                transform: scale3d(0.3, 0.3, 0.3);
            }

            50% {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                -webkit-transform: scale3d(0.3, 0.3, 0.3);
                transform: scale3d(0.3, 0.3, 0.3);
            }

            50% {
                opacity: 1;
            }
        }

        .zoomIn {
            -webkit-animation-name: zoomIn;
            animation-name: zoomIn;
        }
    </style>

    <title>inKadus</title>
</head>
<body class="text-center">

<h1 class="animated zoomIn">inKadus</h1>

<h3 class="animated delay fadeIn">Le premier site de prêt de personnel entre professionnels de santé.</h3>

<p class="animated delay fadeIn">Pré-inscrivez vous</p>

{{ Form::open(['route' => 'register.email', 'class' => 'animated delay fadeIn']) }}

{{ Form::email('email', null, ['autocomplete' => 'off', 'placeholder' => 'exemple@email.fr']) }}

{{ Form::submit('Valider') }}
{{ Form::close() }}

@if($errors->has('email'))
    <p>{{ $errors->first('email') }}</p>
@endif
</body>
</html>