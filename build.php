<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dir = './';
$files = scandir($dir, 1);
$LAST_DATE = '2022-01-11';

function sanitize() {
	foreach($files as $f) {
		echo $f.'<br>';
		$p = explode('-', $f);
		if (count($p) === 5) {
			$day = substr($p[3], 0, 2);
			$month = substr($p[3], 2, 2);
			$year = substr($p[3], 4,4);
			$new = $year.'-'.$month.'-'.$day.'_';
			$new .= $p[0].'-'.$p[1].'-'.$p[2].'.zip';
		}
	}
}


//generer kommune kumulativ incidens
function createMuncTestPos() {
	global $LAST_DATE;
	$begin = new DateTime('2020-05-06');
	$end = new DateTime($LAST_DATE);

	$interval = DateInterval::createFromDateString('1 day');
	$period = new DatePeriod($begin, $interval, $end);

	$json = array();

	foreach ($period as $dt) {
		$date = $dt->format('Y-m-d');
		$dir = 'data/'.$date.'_Data-Epidemiologiske-Rapport';
		$file = $dir.'/Municipality_test_pos.csv';
	
		if (file_exists($file)) {
			//echo 'createMuncTestPos() '.$date.' ....ok<br>';
			$LAST_DATE = $date; //!!
			$handle = fopen($file, 'r');
			$headers = fgetcsv($handle, 1024, ';');
			$headers = array_map(function($h) { 
				return preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $h);
			}, $headers);
			$complete = array();
			while ($row = fgetcsv($handle, 1024, ';')) {
				$row = array_map('trim', $row);
		    $complete[] = array_combine($headers, $row);
			}
			fclose($handle);
			$json[$date] = $complete;
		} else {
			//echo $date.' failed<br>';
		} 
	}
	$test = json_encode($json); 
	file_put_contents('Municipality_test_pos.json', $test);
	echo 'Municipality_test_pos.json ....ok<br>';
}
createMuncTestPos();


//kommune cases time series
function createCasesTimeSeries() {
	global $LAST_DATE;
	$file = 'data/'.$LAST_DATE;
	$file .= '_Data-Epidemiologiske-Rapport/';
	$file .= 'Municipality_cases_time_series.csv';
	if (file_exists($file)) {
		echo 'createCasesTimeSeries() ....ok<br>';
		$handle = fopen($file, 'r');
		$headers = fgetcsv($handle, 1024, ';');
		while ($row = fgetcsv($handle, 1024, ';')) {
			$row = array_map('trim', $row);
	    $complete[] = array_combine($headers, $row);
		}
		fclose($handle);
	} 
	
	$test = json_encode($complete, JSON_INVALID_UTF8_SUBSTITUTE);
	file_put_contents('Municipality_cases_time_series.json', $test);
}
createCasesTimeSeries();


//kommune test time series
function createTestTimeSeries() {
	global $LAST_DATE;
	$file = 'data/'.$LAST_DATE; 
	$file .= '_Data-Epidemiologiske-Rapport/';
	$file .= 'Municipality_tested_persons_time_series.csv';
	if (file_exists($file)) {
		echo 'createTestTimeSeries() ....ok<br>';
		$handle = fopen($file, 'r');
		$headers = fgetcsv($handle, 1024, ';');
		while ($row = fgetcsv($handle, 1024, ';')) {
			$row = array_map('trim', $row);
	    $complete[] = array_combine($headers, $row);
		}
		fclose($handle);
	} 
	
	$test = json_encode($complete, JSON_INVALID_UTF8_SUBSTITUTE);
	file_put_contents('Municipality_tested_persons_time_series.json', $test);
}
createTestTimeSeries();


?>
