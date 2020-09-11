<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="distortion.css">
</head>
<body>

</body>
</html>

.distortion
{
	
	font-family: 'Poppins',sans-serif;


		display: flex;
		justify-content: center;
	align-items: center;
	min-height: 30vh;
	background: #000;
}


.distortion
h1{
	position: relative;
	margin: 0;
	font-size: 4em;
	color: #fff;
	z-index: 1;
	overflow: hidden;
}

.distortion
h1:before{
	content: '';
	position: absolute;
	left:110%;
	width: 120%;
	height: 100%;
	background: linear-gradient(90deg,transparent 0%, #000 5%, #000
		100%);

	animation: animate 5.5s linear forwards;
	animation-delay: 2s;
}

@keyframes animate {
	0%
	{
		left:110%;

	}
	100%
	{
		left: -20%;
	}
}



.distortion h1 span{
	color: #ff022c;
}

.distortion video
{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 30%;
	object-fit: cover;
	z-index: 2;
	pointer-events: none;
	mix-blend-mode: screen;
	margin-bottom: 160%;
}







