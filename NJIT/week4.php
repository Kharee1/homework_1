<?php

$date =  date('Y-m-d', time());
echo "The value of \$date: ". $date ."<br />";

$tar = "2017/05/24";
echo "The value of \$tar: ". $tar ."<br />";

$year = array("2012", "396", "300","2000", "1100", "1089");
echo "The value of \$year: ";
print_r($year);
echo '<br />';

//Question 2
$new_date = str_replace('-', '/', $date);
echo $new_date .'<br />';

//Question 3
$date_newformat = strtotime($date);
$tar_newformat = strtotime($tar);
$diff = $date_newformat - $tar_newformat;
if ($diff > 0) {
	echo 'the future' . '<br />';
} elseif ($diff < 0) {
	echo 'the past' . '<br />';
} else {
	echo 'Oops' . '<br />';
}

//Question 4
$date_str = $new_date;
$date_index ='The position for / are: ';

for ($i=0; $i < strlen($date_str); $i++) { 
	if ($date_str[$i]=='/') {
	    $date_index .= $i .' ';
	}
}
echo $date_index .'<br />';

//Question 5
$date_nodash = $date;
$date_nodash = str_replace('-', ' ', $date_nodash);
echo str_word_count($date_nodash).' words'.'<br />';

//Question 6
echo 'The length of '.$date_str.' is: '.strlen($date_str).'<br />';

//Question 7
echo 'The ASCII value of the first character of date str is: '.ord($date_str[0]).'<br />';

//Question 8
echo 'The last two characters of $date are: '.substr($date,-2,strlen($date)).'<br />';

//Question 9
$date_array = explode('/', $new_date);
print_r($date_array);
echo '<br />';

//Question 10
echo '<br /> Using foreach and if statement<br />';
foreach ($year as $value) {
	$str_value = "$value";
	$int_value = intval($str_value);
	echo $int_value;
	if ($int_value % 4 == 0) {
		echo ' True ';
	} else {
		echo ' False ';
	}
}
echo '<br />Using foreach and switch statement<br />';
foreach ($year as $value) {
	$str_value = "$value";
	$int_value = intval($str_value);
	$switch_var = $int_value % 4;
	switch($switch_var) {
		case 0:
			echo $int_value. ':' . ' True '. '|' . ' ';
			break;
		case 1:
			echo $int_value.':' .' False ' . '|' .' ';
			break;
	}
}
