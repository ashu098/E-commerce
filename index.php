<!DOCTYPE html>
<html>
<head>
	<title>
		E-commerce
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="loader/loader.css">

	<style>
		

		body {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			flex-direction: column;
			background: #050801;
			margin: 0;
			padding: 0;
			font-family: consolas;
			box-sizing: border-box;
		}

		a {
			position: relative;
			display: inline-block;
			padding: 50px 40px;
			margin: 50px 0;
			color: #03e9f4;
			font-size: 24px;
			text-decoration: none;
			overflow: hidden;
			text-transform: uppercase;
			transition: 0.5s;
			letter-spacing: 4px;

			-webkit-box-reflect: below 1px linear-gradient(transparent, #0005);
		}

		h1 {
			display: inline-block;
			margin: 50px 0;
			transition: 0.5s;
			padding: 50px 40px;
			text-decoration: none;
			overflow: hidden;
			color: #03e9f4;
			text-transform: uppercase;
			letter-spacing: 4px;
			-webkit-box-reflect: below 1px linear-gradient(transparent, #0005);
			box-shadow: 0 0 5px #03e9f4,
						0 0 25px #03e9f4,
						0 0 50px #03e9f4,
						0 0 200px #03e9f4;
		}

		a:nth-child(1) {
			filter: hue-rotate(290deg);
		}

		a:nth-child(3) {
			filter: hue-rotate(110deg);
		}

		a:hover {
			background: #03e9f4;
			color: #050801;
			box-shadow: 0 0 5px #03e9f4,
						0 0 25px #03e9f4,
						0 0 50px #03e9f4,
						0 0 200px #03e9f4;
			text-decoration: none;
		}

		a span {
			position: absolute;
			display: block;
		}

		a span:nth-child(1) {
			top: 0;
			left: -100%;
			width: 100%;
			height: 2px;	
			background: linear-gradient(90deg, transparent, #03e9f4);
			animation: animate1 1s linear infinite;
		}

		@keyframes animate1 {
			0% {
				left: -100%;
			}
			50%,100% {
				left: 100%;
			}
		}

		a span:nth-child(2) {
			top: -100%;
			right: 0;
			width: 2px;
			height: 100%;
			background: linear-gradient(180deg, transparent, #03e9f4);
			animation: animate2 1s linear infinite;
			animation-delay: 0.25s;
		}

		@keyframes animate2 {
			0% {
				top: -100%;
			}
			50%,100% {
				top: 100%;
			}
		}

		a span:nth-child(3) {
			bottom: 0;
			right: -100%;
			width: 100%;
			height: 2px;
			background: linear-gradient(270deg, transparent, #03e9f4);
			animation: animate3 1s linear infinite;
			animation-delay: 0.5s;
		}

		@keyframes animate3 {
			0% {
				right: -100%;
			}
			50%,100% {
				right: 100%;
			}
		}

		a span:nth-child(4) {
			bottom: -100%;
			left: 0;
			width: 2px;
			height: 100%;
			background: linear-gradient(360deg, transparent, #03e9f4);
			animation: animate4 1s linear infinite;
			animation-delay: 0.75s;
		}

		@keyframes animate4 {
			0% {
				bottom: -100%;
			}
			50%,100% {
				bottom: 100%;
			}
		}



	</style>

</head>
<body>

 	<div id="loader"></div>
 	<h1>E-Commerce Website</h1>
	<a href="admin/login.php">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		ADMINS
	</a>

	<a href="index1.php">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		CUSTOMERS
	</a>

	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script>
		var loader;
		function loadNow(opacity) {
			
			if(opacity<=0) {
				displayContent();
			}
			else {
				loader.style.opacity = opacity;
				window.setTimeout(function() {
					loadNow(opacity - 0.05)
				}, 50);
			}
		}

		function displayContent() {
			loader.style.display = 'none';
		}

		document.addEventListener("DOMContentLoaded", function() {
			loader = document.getElementById('loader');
			loadNow(1);
		});
	</script>

</body>
</html>