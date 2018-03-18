<?php
/*
 * Author: Jacob Williams
 * Desc: Script for retrieving all the values with a certain date.
 * Notes: Data is possibly wrong format? linegraph doesnt display.
 * Sources: https://www.quirksmode.org/blog/archives/2005/12/the_ajax_respon.html
 *          https://stackoverflow.com/questions/17662441/showing-google-chart-dynamically-in-div-using-php-and-ajax
 *          https://www.w3schools.com/js/js_json_intro.asp
 *          http://php.net/manual/en/book.simplexml.php
 */

//request required data.
$location = $_REQUEST["location"];
$date = $_REQUEST["date"];

//load xml, perform query.
$xml = simplexml_load_file($location);
$results = $xml->xpath("//reading[@date='$date']");

//create arrays for storing data.
$rows = array();
$table = array();
$table["cols"] = array(array("label" => "date/time", "type" => "date"),
                       array("label" => "NO2", "type" =>"number"));

//define date format.
$dformat = "d/m/Y H:i:s";

//loop for each result recieved.
foreach($results as $single){
    //read the data, date and against data format.
    $read = simplexml_load_string($single->asXML());
    $date = DateTime::createFromFormat($dformat, ($read->attributes()->date 
            . " " . $read->attributes()->time));
    $val = $read->attributes()->val;
    
    //format the date values.
    $temp = array();
    $gcJSONDate = "Date(" . date("Y", $date->format("U")) . ", " 
                          . date("m", $date->format("U")) . ", " 
                          . date("d", $date->format("U")) . ", " 
                          . date("H", $date->format("U")) . ", " 
                          . date("i", $date->format("U")) . ", " 
                          . date("s", $date->format("U")) . ")";  
    //store formatted data.
    $temp[] = array("v" => $gcJSONDate);
    $temp[] = array("v" => abs($val));
    $rows[] = array("c" => $temp);
}

//store and encode final data.
$table["rows"] = $rows;
$tJSON = json_encode($table);

//return data.
echo $tJSON;
?>

