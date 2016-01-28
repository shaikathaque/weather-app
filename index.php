<!doctype html>
<html>
<head>
		<title>Weather App</title>
		
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
<style>

	html, body {
		
		height: 100%;
		
	}
	

	.container {
		
		background-image:url("background.jpg");
		width: 100%;
		height: 100%;
		background-size: cover;
		background-position: center;
		padding-top: 130px;
	}
	
	.center {
		
		text-align: center;
		
	}
	
	.white {
		
		color :white;
		
	}
	
	p {
		
		padding: 15px;
		
	}
	
	button {
		
		margin-top: 20px;
		
	}
	
	.alert {
		
		margin-top: 20px;	
		display:none;
		
	}

</style>
		
</head>

<body>

	<div class="container">
	
		<div class="row">
	
			<div class="col-md-6 col-md-offset-3 center">
			
				<h1 class="center">Weather Forecast </h1>
				
				<p class="lead center"> Enter your city below to get a forecast
				for the weather. </p>
				
				<form>
				
					<div class="form-group">
					
						<input type="text" id="city" class="form-control" name="city"
						placeholder="Eg. New York, Paris, Tokyo..."/>
					
					</div>
					
					<button id="findMyWeather" class="btn btn-success btn-lg"> Find my weather </button>
					
					
				
				</form>
			
				<div id="success" class="alert alert-success"></div>
				
				<div id="fail" class="alert alert-danger">Could not find weather data for that city.
				 Please try again!</div>
				 
				 <div id="noCity" class="alert alert-danger">Please enter a city.</div>
			
			</div>

		</div>

	</div



	
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>

	//javascript to get weather data from weather-forecast.com

	$("#findMyWeather").click(function(event) {
		
		event.preventDefault(); 
		
		if ($("#city").val()!="") { //if something is entered
		
		$.get("scraper.php?city="+$("#city").val(), function( data ) { //get city name from form and use it as $_GET variable for scraper.php
			
			if(data=="") { //if form empty
				
				//hide previous messages and display error message
				
				$("#noCity").hide(); 
				$("#success").hide();
				$("#fail").fadeIn();
				
			} else {
			
				//hide previous messages and display city name
			
			$("#noCity").hide();
			$("#fail").hide();
			$("#success").html(data).fadeIn();
			
			}
			
		});
		
		} else {
			
			//hide previous messages and display that city not entered
			
			$("#success").hide();
			$("#fail").hide();
			$("#noCity").fadeIn();
			
		}
		
	}); 


</script>

</body>
</html>