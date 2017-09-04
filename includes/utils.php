<?php
require_once __DIR__ . '/../vendor/autoload.php';

define("DATA_KEY_CHANNEL_COLUMNS", 'ChannelColumns');
define("DATA_KEY_CHANNELS", 'Channels');
define("DATA_KEY_CONTACTS", 'Contacts');
define("DATA_KEY_GENERAL_SETTINGS", 'GeneralSettings');
define("DATA_KEY_MENU_ITEMS", 'MenuItems');
define("DATA_KEY_BUTTON_DEFINITIONS", 'Buttons');
define("DATA_KEY_RX_GROUP_LISTS", 'RxGroupLists');
define("DATA_KEY_SCAN_LISTS", 'ScanLists');
define("DATA_KEY_TEXT", 'Text');
define("DATA_KEY_ZONES", 'Zones');

define("PERSONAL_CONFIG_TEMPLATE", 'https://docs.google.com/spreadsheets/d/1XbzGn-9W2ydjr4V35HAWl3rYraKYfxO-EtZEwbM-UTw/');

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

function extractDocumentId($docIdOrURL) {
	if ($docIdOrURL == null) {
		return null;
	}

	if (preg_match('/^[-_a-zA-Z0-9]+$/', $docIdOrURL) === 1) {
		return $docIdOrURL;
	} else if (preg_match('/^http.*\/d\/([-_a-zA-Z0-9]+)\/edit.*$/', $docIdOrURL, $matches) === 1) {
		// We got the full URL, so extract the doc ID
		return $matches[1];
	}

	return null;
}
?>