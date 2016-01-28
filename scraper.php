<?php 

	error_reporting(0); //Do not return an error message

	$city=$_GET['city'];
	
	$city=str_replace(" ", "", $city);
	
	$contents=file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest"); //copies contents of webpage to this variable

	preg_match('/3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">(.*?)<\/span>/s', $contents, $matches); //checks if string is found in $contents. 
	//data between the 2 strings is returned in an array $matches[1].
	
	//preg_match('/3 Day Weather Forecast Summary:(.*?)<\/span>/s', $contents, $matches); //does same thing as above commented out section
	
	//print_r($matches);
	
	echo $matches[1];
	
?>