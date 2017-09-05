<?php
require_once __DIR__ . '/autoload.php';

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

function unicodeCharToBinValue($chr) {
	return $chr === 0 ? 0 : ord($chr);
}

function unicodeBinValueToChar($bin) {
	return $bin === 0 ? 0 : chr($bin);
}

function createUnicodeStrArr($str, $length) {
	$strArr = str_split($str);
	while (count($strArr) < $length) {
		$strArr[count($strArr)] = 0;
	}
	return $strArr;
}

function decodeUnicodeStr(&$valArray, $arrayKeyPrefix, $maxLength) {
	$val = '';
	for ($i = 1; $i <= $maxLength && $valArray[$arrayKeyPrefix.$i] != 0; $i++) {
		$val = $val . chr($valArray[$arrayKeyPrefix.$i]);
	}
	return $val;
}

function createToneBCDT($toneValue) {
	if ($toneValue == '') {
		return 0xFFFF;
	}
	$retval = 0x00;
	$digits = '';
	if (substr($toneValue, 0, 1) == 'D') {
		if (substr($toneValue, 4, 1) == 'N') {
			$retval += 0x8000;
		} else {
			$retval += 0XC000;
		}
		$digits = '0'.substr($toneValue, 1, 3);
	} else {
		$parts = explode('.', $toneValue);
		if (strlen($parts[0]) < 3) {
			$parts[0] = str_pad($parts[0], 3, '0', STR_PAD_LEFT);
		}
		if (strlen($parts[0]) > 3) {
			$parts[0] = substr($parts[0], 0, 3);
		}
		if (count($parts) < 2) {
			$parts[1] = '0';
		}
		if (strlen($parts[1]) > 1) {
			$parts[1] = substr($parts[1], 0, 1);
		}
		$digits = $parts[0] . $parts[1];
	}
	$digitArr = str_split($digits);
	$retval |= $digitArr[0] << 12;
	$retval |= $digitArr[1] << 8;
	$retval |= $digitArr[2] << 4;
	$retval |= $digitArr[3];
	return $retval;
}