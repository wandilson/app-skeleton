<!DOCTYPE html>
<html lang="ptbr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 HTML Template by Colorlib</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
				<h5>404 - Essa página não foi encontrada!</h5>
			</div>
			<a href="/">Ir ao Site</a>
		</div>
	</div>

</body>

</html>



<style>
    
    #notfound {
    position: relative;
    height: 100vh;
    }

    #notfound .notfound {
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    }

    .notfound {
    max-width: 520px;
    width: 100%;
    line-height: 1.4;
    text-align: center;
    }

    .notfound .notfound-404 {
    position: relative;
    height: 200px;
    margin: 0px auto 20px;
    z-index: -1;
    }

    .notfound .notfound-404 h1 {
    font-family: 'Montserrat', sans-serif;
    font-size: 236px;
    font-weight: 200;
    margin: 0px;
    color: #211b19;
    text-transform: uppercase;
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    }

    .notfound .notfound-404 h5 {
    font-family: 'Montserrat', sans-serif;
    font-size: 24px;
    font-weight: 400;
    text-transform: uppercase;
    color: #211b19;
    background: #f8f9fe;
    padding: 10px 5px;
    margin: auto;
    display: inline-block;
    position: absolute;
    bottom: 0px;
    left: 0;
    right: 0;
    }

    .notfound a {
    font-family: 'Montserrat', sans-serif;
    display: inline-block;
    font-weight: 700;
    text-decoration: none;
    color: #fff;
    text-transform: uppercase;
    padding: 13px 23px;
    background: #ff6300;
    font-size: 18px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
    }

    .notfound a:hover {
    color: #ff6300;
    background: #211b19;
    }

    @media only screen and (max-width: 767px) {
    .notfound .notfound-404 h1 {
        font-size: 148px;
    }
    }

    @media only screen and (max-width: 480px) {
    .notfound .notfound-404 {
        height: 148px;
        margin: 0px auto 10px;
    }
    .notfound .notfound-404 h1 {
        font-size: 86px;
    }
    .notfound a {
        padding: 7px 15px;
        font-size: 14px;
    }

</style>