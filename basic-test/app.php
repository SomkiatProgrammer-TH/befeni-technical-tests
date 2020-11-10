<?php

echo "Befeni Technical Test [Basic] - Calculator\r\n";
$handle = fopen ("php://stdin","r");
$result = '';

while (true) {
	$input = fgets($handle);
	$command = "";
	$num = 0;

	$input = str_replace( 
		array( "\r\n", "\n" ), array( "", "" ), trim( $input ) 
	);
	$input = @explode(" ", $input, 2);
	if (isset($input[1])) {
		list($command, $num) = $input;
		$num = (int)$num;
	} else {
		$command = $input[0];
	}

	if (!is_callable($command) || $command == "_process") {
		echo "Do not know \"$command\".\r\n";
	} else {
		call_user_func($command, $num);
	}
}

fclose($handle);

function add($num) {
	$operator = '+';
	_process($operator, $num);	
}

function divide($num) {
	$operator = '/';
	_process($operator, $num);	
}

function multiply($num) {
	$operator = '*';
	_process($operator, $num);
}

function subtract($num) {
	$operator = '-';
	_process($operator, $num);
}

function _process($operator, $num) {
	GLOBAL $result;

	if ($result != '') {
		$result = '(' . $result . $num . ')' . $operator;
	} else {
		$result .= $num . $operator;
	}
}

function apply($num) {
	GLOBAL $result;
	$result .= $num;

	eval( '$result = (' . $result. ');' );
	echo ($result) . "\r\n";

	$result = "";
}

function quit() {
	echo "GOOD BYE!\r\n";
    exit;
}

?>