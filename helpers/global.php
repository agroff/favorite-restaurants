<?php

/**
 * Escapes html then prints $output
 * @param $output
 */
function o($output)
{
	echo htmlentities($output);
}

/**
 * Dumps a variable for inspection in a console
 * @param $item
 *
 * @return void
 */
function cdbg($item){

	if(is_array($item) || is_object($item))
	{
		print_r($item);
		return;
	}

	echo $item . "\n";
	return;
}

/**
 * Dumps a variable for inspection in a browser
 * @param $item
 */
function dbg($item)
{
	echo "<pre>";
	var_dump($item);
	echo "</pre>";
}

/**
 * Includes a view. Data passes via the $data parameter is extracted into local variables
 * @param       $file
 * @param array $data
 */
function view($file, $data = array())
{
	extract($data);
	require(DOC_ROOT . '/views/' . $file . '.php');
}

/**
 * Formats a date into a MySQL compatible string
 * @param string $date
 *
 * @return bool|string
 */
function sqlDate($date = 'now')
{
	$time = strtotime($date);
	return date('Y-m-d H:i:s', $time);
}


function template($id)
{

	echo '<script type="text/html" id="'.$id.'">';
	view("template/" . $id);
	echo '</script>';

}

function get($key)
{
	if (!isset($_GET[$key])) {
		return false;
	}

	return $_GET[$key];
}

function post($key)
{
	if (!isset($_POST[$key])) {
		return false;
	}

	return $_GET[$key];
}