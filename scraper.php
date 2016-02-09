<?php 

	//Do not return any error message
	//Returning an error message will cause problems in index.php
	error_reporting(0); 

	//get city data sent from index.php
	$city=$_GET['city'];
	
	//remove any spaces in city name
	$city=str_replace(" ", "", $city);
	
	//copies html data from below URL to $contents
	$contents=file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest"); 

	//checks if the string in the first parameter is found in $contents..
	//the data in between, which is in place of (.*?) is saved in the array $matches[1]
	//			/ is used to denote the beginning and end of the Regex
	//			\ is used before / to escape it so that PHP doesn't consider / to be the end of the Regex
	//			s is at the end of the PHP after / so that PHP checks multiple lines
	preg_match('/3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">(.*?)<\/span>/s', $contents, $matches);  
	
	//echo weather data
	echo $matches[1];
	
?>