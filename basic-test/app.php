<?php

echo "Befeni Technical Test [Basic] - Calculator\r\n";
$handle = fopen ("php://stdin","r");
$result = '';

while (true) {
	$input = fgets($handle);
	$command = "";
	$arg = 0;

	$input = str_replace( 
		array( "\r\n", "\n" ), array( "", "" ), trim( $input ) 
	);
	$input = @explode(" ", $input, 2);
	if (isset($input[1])) {
		list($command, $arg) = $input;
		$arg = (int)$arg;
	} else {
		$command = $input[0];
	}

	if (!is_callable($command) || $command == "_process") {
		echo "Do not know \"$command\".\r\n";
	} else {
		call_user_func($command, $arg);
	}
}

fclose($handle);

function add($arg) {
	$operator = '+';
	_process($operator, $arg);	
}

function divide($arg) {
	$operator = '/';
	_process($operator, $arg);	
}

function multiply($arg) {
	$operator = '*';
	_process($operator, $arg);
}

function subtract($arg) {
	$operator = '-';
	_process($operator, $arg);
}

function _process($operator, $arg) {
	GLOBAL $result;

	if ($result != '') {
		$result = '(' . $result . $arg . ')' . $operator;
	} else {
		$result .= $arg . $operator;
	}
}

function apply($arg) {
	GLOBAL $result;
	$result .= $arg;

	eval( '$result = (' . $result. ');' );
	echo ($result) . "\r\n";

	$result = "";
}

function quit() {
	echo "GOOD BYE!\r\n";
    exit;
}

?>