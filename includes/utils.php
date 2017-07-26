<?php
require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class_name) {
	include 'classes/' . $class_name . '.php';
});

$warningArr = array();
$errorArr = array();
function addWarning($warningMsg) {
	global $warningArr;
	$warningArr[] = $warningMsg;
}

function addError($errorMsg) {
	global $errorArr;
	$errorArr[] = $errorMsg;
}

function getWarnings() {
	global $warningArr;
	return $warningArr;
}

function getErrors() {
	global $errorArr;
	return $errorArr;
}

function calculateAckHash() {
	$ackText = '';
	foreach (getWarnings() as $warning) {
		$ackText = $ackText . '-' . md5($warning);
	}

	return md5($ackText);
}
?>