<!DOCTYPE html>

<html>

<head>
	<title>Home </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Merriweather&family=Patua+One&family=Rubik:wght@300;600&family=Sacramento&family=Satisfy&family=Sniglet&family=Zen+Maru+Gothic:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		a:hover {
			text-decoration: none;
			color: white;
		}



		.btn {
			background-image: linear-gradient(to right, #E0EAFC 0%, #CFDEF3 51%, #E0EAFC 100%);
			transition: 0.5s;
			color: #0d324d;
			border-radius: 2px;
			display: inline-block;
			font-size: 25px;
			width: 420px;
			height: 50px;
			border-radius: 2px;
			cursor: pointer;
			text-align: center;
			text-decoration: none;
			box-shadow: 5px 10px 18px #0d324d;
		}


		.btn:hover {
			background-position: right center;
			/* change the direction of the change here */
			color: #fff;
			text-decoration: none;
		}

		.container {
			width: 100%;
			display: flex;
		}

		.container img {
			width: 60px;
			align-items: left;
			margin-right: 27%;
			margin-left: 1%;
		}

		.inner_header {
			width: 80%;
			margin: auto;
		}

		.header_link {
			float: center;
			font-size: 14px;
			height: 50px;
			font-size: 16px;
			font-weight: bold;
			color: white;
		}

		.box {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.logo {
			margin-right: 95%;

		}

		body {
			width: 100%;
			height: 100%;
			margin: 0;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			text-align: center;
			background-image: linear-gradient(315deg, #0da2ff 0%, #0d324d 74%);
		}

		.mainbox {
			width: 100%;
			position: absolute;
			top: 0px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		h1 {
			font-size: 2rem;
			font-family: 'Cinzel', serif;
			color: #154263;
			line-height: 0;
			/* text-align: center; */
			margin-left: 38%;
			padding-right: 8px;
			padding-top: 1.5%;
			font-weight: bold;
			margin-top: 1.35%;

			/* position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0; */
		}

		h3 {
			font-size: 1.3rem;
			font-family: 'Zen Maru Gothic', sans-serif;
			color: whitesmoke;
			line-height: 1;
			margin-top: 0;
			padding-top: 0;

		}

		.wave-container {
			position: relative;
			height: 170px;
		}

		.container {
			margin-top: 1%;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin-bottom: 0;
			height: 80px;
		}

		@media (max-width: 820px) {
			.box {
				display: flex;
				flex-direction: column;
			}

			.h1 {
				margin-left: 33%;
			}
		}
	</style>
</head>

<body>
	<div class="wave-container">
		<svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 190" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<defs>
				<linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
					<stop stop-color="rgba(169.4, 217.336, 255, 1)" offset="0%"></stop>
					<stop stop-color="rgba(219, 233, 244, 1)" offset="100%"></stop>
				</linearGradient>
			</defs>
			<path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,38L26.7,57C53.3,76,107,114,160,110.8C213.3,108,267,63,320,57C373.3,51,427,82,480,104.5C533.3,127,587,139,640,145.7C693.3,152,747,152,800,139.3C853.3,127,907,101,960,82.3C1013.3,63,1067,51,1120,63.3C1173.3,76,1227,114,1280,110.8C1333.3,108,1387,63,1440,47.5C1493.3,32,1547,44,1600,50.7C1653.3,57,1707,57,1760,60.2C1813.3,63,1867,70,1920,85.5C1973.3,101,2027,127,2080,133C2133.3,139,2187,127,2240,101.3C2293.3,76,2347,38,2400,25.3C2453.3,13,2507,25,2560,47.5C2613.3,70,2667,101,2720,123.5C2773.3,146,2827,158,2880,152C2933.3,146,2987,120,3040,98.2C3093.3,76,3147,57,3200,63.3C3253.3,70,3307,101,3360,104.5C3413.3,108,3467,82,3520,82.3C3573.3,82,3627,108,3680,104.5C3733.3,101,3787,70,3813,53.8L3840,38L3840,190L3813.3,190C3786.7,190,3733,190,3680,190C3626.7,190,3573,190,3520,190C3466.7,190,3413,190,3360,190C3306.7,190,3253,190,3200,190C3146.7,190,3093,190,3040,190C2986.7,190,2933,190,2880,190C2826.7,190,2773,190,2720,190C2666.7,190,2613,190,2560,190C2506.7,190,2453,190,2400,190C2346.7,190,2293,190,2240,190C2186.7,190,2133,190,2080,190C2026.7,190,1973,190,1920,190C1866.7,190,1813,190,1760,190C1706.7,190,1653,190,1600,190C1546.7,190,1493,190,1440,190C1386.7,190,1333,190,1280,190C1226.7,190,1173,190,1120,190C1066.7,190,1013,190,960,190C906.7,190,853,190,800,190C746.7,190,693,190,640,190C586.7,190,533,190,480,190C426.7,190,373,190,320,190C266.7,190,213,190,160,190C106.7,190,53,190,27,190L0,190Z"></path>
		</svg>

		<div class="mainbox">
			<a href="./index.php"><img src="./images/loho2.png" alt="Logo" width="60px" height="60px"></a>
			<h1>Trace the Missing</h1>
		</div>
	</div>
	<h3>"Our vision is for every missing child and adult, and every loved one left behind, to find help, hope and a safe way to reconnect."</h3>
	<center>
		<br>
		<div class="box">
			<div class="icon">
				<img src="./images/search.svg" alt="icon" style="height:420px;">
			</div>
			<br>
			<div class="btns">
				<a href="./police_signup.php"><button class="btn" onMouseOver="this.style.color='#0288d1'" onMouseOut="this.style.color='#0d324d'"> Police</button></a>
				<br>
				<br>
				<br>
				<a href="user_signup.php"><button class="btn" u onMouseOver="this.style.color='#0288d1'" onMouseOut="this.style.color='#0d324d'"> User</button></a>
			</div>
		</div>
	</center>
</body>

</html>