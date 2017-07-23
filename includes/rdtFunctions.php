<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/classloader.php';
require_once __DIR__ . '/clientHelper.php';

define("DATA_KEY_CHANNEL_COLUMNS", 'ChannelColumns');
define("DATA_KEY_CHANNELS", 'Channels');
define("DATA_KEY_CONTACTS", 'Contacts');
define("DATA_KEY_GENERAL_SETTINGS", 'GeneralSettings');
define("DATA_KEY_MENU_ITEMS", 'MenuItems');
define("DATA_KEY_RX_GROUP_LISTS", 'RxGroupLists');
define("DATA_KEY_SCAN_LISTS", 'ScanLists');
define("DATA_KEY_TEXT", 'Text');
define("DATA_KEY_ZONES", 'Zones');

define("ROW_GENERAL_INFO1", "Info Screen Line 1");
define("ROW_GENERAL_INFO2", "Info Screen Line 2");
define("ROW_GENERAL_MONITOR_TYPE", "Monitor Type");
define("ROW_GENERAL_DISABLE_LEDS", "Disable All LEDs");
define("ROW_GENERAL_TALK_PERMIT_TONE", "Talk Permit Tone");
define("ROW_GENERAL_PASSWORD_ENABLE", "Password and Lock Enable");
define("ROW_GENERAL_CH_FREE_TONE", "Ch Free Indication Tone");
define("ROW_GENERAL_DISABLE_ALL_TONE", "Disable All Tone");
define("ROW_GENERAL_SAVE_MODE_RECV", "Save Mode Receive");
define("ROW_GENERAL_SAVE_PREAMBLE", "Save Preamble");
define("ROW_GENERAL_INTRO_SCREEN", "Intro Screen");
define("ROW_GENERAL_RADIO_ID", "Radio Id");
define("ROW_GENERAL_TX_PREAMBLE", "Tx Preamble Duration (ms)");
define("ROW_GENERAL_GROUP_CALL_HANG_TIME", "Group Call Hang Time (ms)");
define("ROW_GENERAL_PRIVATE_CALL_HANG_TIME", "Private Call Hang Time (ms)");
define("ROW_GENERAL_VOX_SENSITIVITY", "Vox Sensitivity");
define("ROW_GENERAL_RX_LOW_BATT", "Rx Low Battery Interval (s)");
define("ROW_GENERAL_CALL_ALERT_TONE", "Call Alert Tone Duration (s)");
define("ROW_GENERAL_LONE_WORKER_RESP", "Lone Worker Resp Time (min)");
define("ROW_GENERAL_LONE_WORKER_REMIND", "Lone Worker Reminder Time (s)");
define("ROW_GENERAL_SCAN_DIGITAL_HANG_TIME", "Scan Digital Hang Time (ms)");
define("ROW_GENERAL_SCAN_ANALOG_HANG_TIME", "Scan Analog Hang Time (ms)");
define("ROW_GENERAL_KEYPAD_LOCK_TIME", "Keypad Lock Time");
define("ROW_GENERAL_BACKLIGHT_TIME", "Backlight Time (s)");
define("ROW_GENERAL_MODE", "Mode");
define("ROW_GENERAL_POWER_ON_PASSWORD", "Power On Password");
define("ROW_GENERAL_RADIO_PROGRAM_PASSWORD", "Radio Program Password");
define("ROW_GENERAL_PC_PROGRAM_PASSWORD", "PC Program Password");
define("ROW_GENERAL_RADIO_NAME", "Radio Name");

define("ROW_MENU_MENU_HANG_TIME", "Menu Hang Time [s]");
define("ROW_MENU_TEXT_MESSAGE", "Text Message");
define("ROW_MENU_CALL_ALERT", "Call Alert");
define("ROW_MENU_MANUAL_DIAL", "Manual Dial");
define("ROW_MENU_REMOTE_MONITOR", "Remote Monitor");
define("ROW_MENU_RADIO_ENABLE", "Radio Enable");
define("ROW_MENU_EDIT", "Edit");
define("ROW_MENU_RADIO_CHECK", "Radio Check");
define("ROW_MENU_PROGRAM_KEY", "Program Key");
define("ROW_MENU_RADIO_DISABLE", "Radio Disable");
define("ROW_MENU_MISSED", "Missed");
define("ROW_MENU_OUTGOING_RADIO", "Outgoing Radio");
define("ROW_MENU_ANSWERED", "Answered");
define("ROW_MENU_TALKAROUND", "Talkaround");
define("ROW_MENU_POWER", "Power");
define("ROW_MENU_INTRO_SCREEN", "Intro Screen");
define("ROW_MENU_LED_INDICATOR", "LED Indicator");
define("ROW_MENU_PASSWORD_AND_LOCK", "Password And Lock");
define("ROW_MENU_DISPLAY_MODE", "Display Mode");
define("ROW_MENU_TONE_OR_ALERT", "Tone Or Alert");
define("ROW_MENU_BACKLIGHT", "Backlight");
define("ROW_MENU_KEYBOARD_LOCK", "Keyboard Lock");
define("ROW_MENU_SQUELCH", "Squelch");
define("ROW_MENU_VOX", "Vox");
define("ROW_MENU_PROGRAM_RADIO", "Program Radio");
define("ROW_MENU_SCAN", "Scan");
define("ROW_MENU_EDIT_LIST", "Edit List");

define("COL_CHANNEL_NAME", "Name");
define("COL_CHANNEL_LONE_WORKER", "Lone Worker");
define("COL_CHANNEL_SQUELCH", "Squelch");
define("COL_CHANNEL_AUTOSCAN", "Autoscan");
define("COL_CHANNEL_BANDWIDTH", "Bandwidth");
define("COL_CHANNEL_CHANNEL_MODE", "Channel Mode");
define("COL_CHANNEL_COLOR_CODE", "Color Code");
define("COL_CHANNEL_REPEATER_SLOT", "Repeater Slot");
define("COL_CHANNEL_RX_ONLY", "Rx Only");
define("COL_CHANNEL_ALLOW_TALKAROUND", "Allow Talkaround");
define("COL_CHANNEL_DATA_CALL_CONFIRMED", "Data Call Confirmed");
define("COL_CHANNEL_PRIVATE_CALL_CONFIRMED", "Private Call Confirmed");
define("COL_CHANNEL_DISPLAY_PTT_ID", "Display PTT Id");
define("COL_CHANNEL_COMPRESSED_UDP_HEADER", "Compressed Udp Hdr");
define("COL_CHANNEL_RX_REF_FREQ", "Rx Ref Freq");
define("COL_CHANNEL_ADMIT_CRITERIA", "Admit Criteria");
define("COL_CHANNEL_POWER", "Power");
define("COL_CHANNEL_VOX", "VOX");
define("COL_CHANNEL_QT_REVERSE", "Qt Reverse");
define("COL_CHANNEL_REVERSE_BURST", "Reverse Burst");
define("COL_CHANNEL_TX_REF_FREQ", "Tx Ref Freq");
define("COL_CHANNEL_CONTACT_NAME", "Contact Name");
define("COL_CHANNEL_TOT", "TOT");
define("COL_CHANNEL_TOT_REKEY_DELAY", "TOT Rekey Delay");
define("COL_CHANNEL_SCAN_LIST", "Scan List");
define("COL_CHANNEL_GROUP_LIST", "Group List");
define("COL_CHANNEL_DECODE18", "Decode 18");
define("COL_CHANNEL_RX_FREQ", "Rx Freq");
define("COL_CHANNEL_TX_FREQ", "Tx Freq");
define("COL_CHANNEL_CTCSS_DCS_DECODE", "CTCSS DCS Decode");
define("COL_CHANNEL_CTCSS_DCS_ENCODE", "CTCSS DCS Encode");
define("COL_CHANNEL_TX_SIGNALING_SYSTEM", "Tx Signaling System");
define("COL_CHANNEL_RX_SIGNALING_SYSTEM", "Rx Signaling System");

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

function writeRDTGeneralSettings(&$fh, &$settings) {
	fseek($fh, 0x2265);

	$infoLine1Arr = createUnicodeStrArr($settings->getInfoScreenLine1(), 10);
	$infoLine2Arr = createUnicodeStrArr($settings->getInfoScreenLine2(), 10);
	$data = pack("vvvvvvvvvvvvvvvvvvvv",
			unicodeCharToBinValue($infoLine1Arr[0]),
			unicodeCharToBinValue($infoLine1Arr[1]),
			unicodeCharToBinValue($infoLine1Arr[2]),
			unicodeCharToBinValue($infoLine1Arr[3]),
			unicodeCharToBinValue($infoLine1Arr[4]),
			unicodeCharToBinValue($infoLine1Arr[5]),
			unicodeCharToBinValue($infoLine1Arr[6]),
			unicodeCharToBinValue($infoLine1Arr[7]),
			unicodeCharToBinValue($infoLine1Arr[8]),
			unicodeCharToBinValue($infoLine1Arr[9]),
			unicodeCharToBinValue($infoLine2Arr[0]),
			unicodeCharToBinValue($infoLine2Arr[1]),
			unicodeCharToBinValue($infoLine2Arr[2]),
			unicodeCharToBinValue($infoLine2Arr[3]),
			unicodeCharToBinValue($infoLine2Arr[4]),
			unicodeCharToBinValue($infoLine2Arr[5]),
			unicodeCharToBinValue($infoLine2Arr[6]),
			unicodeCharToBinValue($infoLine2Arr[7]),
			unicodeCharToBinValue($infoLine2Arr[8]),
			unicodeCharToBinValue($infoLine2Arr[9])
			);
	fwrite($fh, $data);
	
	fseek($fh, 0x2265 + 64);
	$byte1 = 0b11101010;
	$byte1 |= $settings->getMonitorType() == 'Silent' ? 0 : 0b00010000;
	$byte1 |= $settings->isDisableAllLeds() ? 0 : 0b00000100;

	$byte2 = 0b00001000;
	if ($settings->getTalkPermitTone() == 'Digital') {
		$byte2 |= 0b01000000;
	} else if ($settings->getTalkPermitTone() == 'Analog') {
		$byte2 |= 0b10000000;
	} else if ($settings->getTalkPermitTone() == 'Analog & Digital') {
		$byte2 |= 0b11000000;
	}
	$byte2 |= $settings->isPasswordAndLockEnable() ? 0: 0b00100000;
	$byte2 |= $settings->isChFreeIndicationTone() ? 0 : 0b00010000;
	$byte2 |= $settings->isDisableAllTone() ? 0 : 0b00000100;
	$byte2 |= $settings->isSaveModeReceive() ? 0b00000010 : 0;
	$byte2 |= $settings->isSavePreamble() ? 0b00000001 : 0;

	$byte3 = 0b11101010;
	$byte3 |= $settings->getIntroScreen() == 'Picture' ? 0b00010000 : 0;

	$data = pack("CCCC",
			$byte1, $byte2, $byte3, 0xFF);
	fwrite($fh, $data);

	fseek($fh, 0x2265 + 68);
	$data = pack("V", $settings->getRadioId());
	fwrite($fh, $data);
	
	fseek($fh, 0x2265 + 72);
	$txPreamble = $settings->getTxPreamble();
	if ($txPreamble < 0 || $txPreamble > 144*60) {
		$txPreamble = 0;
		addWarning("Tx Preamble value is invalid - defaulting to 0");
	} else {
		$txPreamble = $txPreamble / 60;
	}

	$groupCallHangTime = $settings->getGroupCallHangTime();
	if ($groupCallHangTime < 0 || $groupCallHangTime > 7000 || $groupCallHangTime % 500 != 0) {
		$groupCallHangTime = 0;
		addWarning("Group Call Hang Time is invalid - defaulting to 0");
	} else {
		$groupCallHangTime = $groupCallHangTime / 100;
	}

	$privateCallHangTime = $settings->getPrivateCallHangTime();
	if ($privateCallHangTime < 0 || $privateCallHangTime > 7000 || $privateCallHangTime % 500 != 0) {
		$privateCallHangTime = 0;
		addWarning("Private Call Hang Time is invalid - defaulting to 0");
		} else {
		$privateCallHangTime = $privateCallHangTime / 100;
	}

	$voxSens = $settings->getVoxSensitivity();
	if ($voxSens < 1 || $voxSens > 9) {
		$voxSens = 3;
		addWarning("Vox sensitivity is invalid - defaulting to 3");
	}

	$data = pack("CCCC",
			$txPreamble, $groupCallHangTime, $privateCallHangTime, $voxSens);
	fwrite($fh, $data);

	fseek($fh, 0x2265 + 78);
	$rxLowBatt = $settings->getRxLowBatteryInterval();
	if ($rxLowBatt < 0 || $rxLowBatt > 5 * 127) {
		$rxLowBatt = 120;
		addWarning("Rx low battery interval is invalid - defaulting to 120");
	} else {
		$rxLowBatt = $rxLowBatt / 5;
	}

	$callAlertTone = $settings->getCallAlertToneDuration();
	if ($callAlertTone < 0 || $callAlertTone > 5 * 240) {
		$callAlertTone = 0;
		addWarning("Call alert tone duration is invalid - defaulting to 0");
	} else {
		$callAlertTone = $callAlertTone / 5;
	}

	$loneWorkerRespTime = $settings->getLoneWorkerRespTime();
	if ($loneWorkerRespTime < 0 || $loneWorkerRespTime > 255) {
		$loneWorkerRespTime = 1;
		addWarning("Lone worker response time is invalid - defaulting to 1");
	}

	$loneWorkerRemTime = $settings->getLoneWorkerReminderTime();
	if ($loneWorkerRemTime < 0 || $loneWorkerRemTime > 255) {
		$loneWorkerRemTime = 10;
		addWarning("Lone worker reminder time is invalid - defaulting to 10");
	}

	$data = pack("CCCC",
			$rxLowBatt, $callAlertTone, $loneWorkerRespTime, $loneWorkerRemTime);
	fwrite($fh, $data);

	fseek($fh, 0x2265 + 83);
	$scanDigHangTime = $settings->getScanDigitalHangTime();
	if ($scanDigHangTime < 500 || $scanDigHangTime > 10000) {
		$scanDigHangTime = 10;
		addWarning("Digital scan hang time is invalid - defaulting to 10");
	} else {
		$scanDigHangTime = $scanDigHangTime / 100;
	}

	$scanAnalogHangTime = $settings->getScanAnalogHangTime();
	if ($scanAnalogHangTime < 0 || $scanAnalogHangTime > 10000) {
		$scanAnalogHangTime = 10;
		addWarning("Analog scan hang time is invalid - defaulting to 10");
	} else {
		$scanAnalogHangTime = $scanAnalogHangTime / 100;
	}
	
	$data = pack("CC",
			$scanDigHangTime, $scanAnalogHangTime);
	fwrite($fh, $data);

	fseek($fh, 0x2265 + 85); //0x22BA
	$backlightTime = 0;
	switch ($settings->getBacklightTime()) {
		case 5: $backlightTime = 1; break;
		case 10: $backlightTime = 2; break;
		case 15: $backlightTime = 3; break;
		default: $backlightTime = 0; break;
	}
	$data = pack("C", $backlightTime);
	fwrite($fh, $data);

	fseek($fh, 0x2265 + 86);
	$keypadLockTime = 255;
	if ($settings->getKeypadLockTime() == 5) {
		$keypadLockTime = 1;
	} else if ($settings->getKeypadLockTime() == 10) {
		$keypadLockTime = 2;
	} else if ($settings->getKeypadLockTime() == 15) {
		$keypadLockTime = 3;
	}

	$mode = 255;
	if ($settings->getMode() == 'mr') {
		$mode = 0;
	}

	$data = pack("CCNN",
			$keypadLockTime, $mode,
			createRevBCD($settings->getPowerOnPassword()),
			createRevBCD($settings->getRadioProgramPassword())
				);
	fwrite($fh, $data);

	fseek($fh, 0x2265 + 96);
	$pcProgramPassword = $settings->getPcProgramPassword();
	if ($pcProgramPassword == NULL || strlen($pcProgramPassword) != 8) {
		fwrite($fh, pack("CCCCCCCC", 0xFF, 0xFF, 0xFF, 0xFF, 0xFF, 0xFF, 0xFF, 0xFF));
	} else {
		fwrite($fh, strtolower($pcProgramPassword));
	}

	fseek($fh, 0x2265 + 112);
	$nameArr = createUnicodeStrArr($settings->getRadioName(), 16);
	$data = pack("vvvvvvvvvvvvvvvv",
			unicodeCharToBinValue($nameArr[0]),
			unicodeCharToBinValue($nameArr[1]),
			unicodeCharToBinValue($nameArr[2]),
			unicodeCharToBinValue($nameArr[3]),
			unicodeCharToBinValue($nameArr[4]),
			unicodeCharToBinValue($nameArr[5]),
			unicodeCharToBinValue($nameArr[6]),
			unicodeCharToBinValue($nameArr[7]),
			unicodeCharToBinValue($nameArr[8]),
			unicodeCharToBinValue($nameArr[9]),
			unicodeCharToBinValue($nameArr[10]),
			unicodeCharToBinValue($nameArr[11]),
			unicodeCharToBinValue($nameArr[12]),
			unicodeCharToBinValue($nameArr[13]),
			unicodeCharToBinValue($nameArr[14]),
			unicodeCharToBinValue($nameArr[15])
			);
	fwrite($fh, $data);
}

function writeRDTMenuItems(&$fh, &$menuItems) {
	fseek($fh, 0x2315);

	$hangTime = $menuItems->getMenuHangTime();
	
	$byte1 = 0b00000000;
	$byte1 |= $menuItems->isRadioDisable()	? 0b10000000 : 0;
	$byte1 |= $menuItems->isRadioEnable()	? 0b01000000 : 0;
	$byte1 |= $menuItems->isRemoteMonitor()	? 0b00100000 : 0;
	$byte1 |= $menuItems->isRadioCheck()	? 0b00010000 : 0;
	$byte1 |= $menuItems->isManualDial()	? 0b00001000 : 0;
	$byte1 |= $menuItems->isEdit()			? 0b00000100 : 0;
	$byte1 |= $menuItems->isCallAlert()		? 0b00000010 : 0;
	$byte1 |= $menuItems->isTextMessage()	? 0b00000001 : 0;

	$byte2 = 0b00000000;
	$byte2 |= $menuItems->isToneOrAlert() ? 0b10000000 : 0;
	$byte2 |= $menuItems->isTalkaround() ? 0b01000000 : 0;
	$byte2 |= $menuItems->isScan() ? 0b00000010 : 0;
	$byte2 |= $menuItems->isEditList() ? 0b00000100 : 0;
	$byte2 |= $menuItems->isOutgoingRadio() ? 0b00100000 : 0;
	$byte2 |= $menuItems->isMissed() ? 0b00001000 : 0;
	$byte2 |= $menuItems->isAnswered() ? 0b00010000 : 0;
	$byte2 |= $menuItems->isProgramKey() ? 0b00000001 : 0;

	$byte3 = 0b00000000;
	$byte3 |= $menuItems->isVox() ? 0b10000000 : 0;
	$byte3 |= $menuItems->isSquelch() ? 0b00100000 : 0;
	$byte3 |= $menuItems->isKeyboardLock() ? 0b00001000 : 0;
	$byte3 |= $menuItems->isBacklight() ? 0b00000010 : 0;
	$byte3 |= $menuItems->isLedIndicator() ? 0b00010000 : 0;
	$byte3 |= $menuItems->isIntroScreen() ? 0b00000100 : 0;
	$byte3 |= $menuItems->isPower() ? 0b00000001 : 0;
	
	$byte4 = 0b11111000;
	$byte4 |= $menuItems->isProgramRadio() ? 0 : 0b00000100;
	$byte4 |= $menuItems->isDisplayMode() ? 0b00000010 : 0;
	$byte4 |= $menuItems->isPasswordAndLock() ? 0b00000001 : 0;
	
	$data = pack("CCCCC",
			$hangTime, $byte1, $byte2, $byte3, $byte4);
	fwrite($fh, $data);
}

function writeRDTDigitalContact(&$fh, $contactNum, $callId, $callType, $name, $recvTone = false) {
	// BCD = little endian = v
	// RevBCD = big endian = n
	fseek($fh, 0x61A5 + (36 * ($contactNum-1)));
	$callId1 = $callId & 0xFF;
	$callId2 = ($callId >> 8) & 0xFF;
	$callId3 = ($callId >> 16) & 0xFF;
	$flags = 0b11000000;
	if ($recvTone) {
		$flags |= 0x20;
	}
	if ($callType == 'G') {
		$flags |= 0x01;
	} else if ($callType == 'P') {
		$flags |= 0x02;
	} else {
		$flags |= 0x03;
	}
	$nameArr = createUnicodeStrArr($name, 16);
	$data = pack("CCCCvvvvvvvvvvvvvvvv", $callId1, $callId2, $callId3,
		$flags,
		unicodeCharToBinValue($nameArr[0]),
		unicodeCharToBinValue($nameArr[1]),
		unicodeCharToBinValue($nameArr[2]),
		unicodeCharToBinValue($nameArr[3]),
		unicodeCharToBinValue($nameArr[4]),
		unicodeCharToBinValue($nameArr[5]),
		unicodeCharToBinValue($nameArr[6]),
		unicodeCharToBinValue($nameArr[7]),
		unicodeCharToBinValue($nameArr[8]),
		unicodeCharToBinValue($nameArr[9]),
		unicodeCharToBinValue($nameArr[10]),
		unicodeCharToBinValue($nameArr[11]),
		unicodeCharToBinValue($nameArr[12]),
		unicodeCharToBinValue($nameArr[13]),
		unicodeCharToBinValue($nameArr[14]),
		unicodeCharToBinValue($nameArr[15])
		);
	fwrite($fh, $data);
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

function writeRDTRxGroupList($fh, $groupListNum, $name, $contactArr) {
	fseek($fh, 0xEE45 + (96 * ($groupListNum-1)));
	$nameArr = createUnicodeStrArr($name, 16);
	$data = pack("vvvvvvvvvvvvvvvv", 
		unicodeCharToBinValue($nameArr[0]),
		unicodeCharToBinValue($nameArr[1]),
		unicodeCharToBinValue($nameArr[2]),
		unicodeCharToBinValue($nameArr[3]),
		unicodeCharToBinValue($nameArr[4]),
		unicodeCharToBinValue($nameArr[5]),
		unicodeCharToBinValue($nameArr[6]),
		unicodeCharToBinValue($nameArr[7]),
		unicodeCharToBinValue($nameArr[8]),
		unicodeCharToBinValue($nameArr[9]),
		unicodeCharToBinValue($nameArr[10]),
		unicodeCharToBinValue($nameArr[11]),
		unicodeCharToBinValue($nameArr[12]),
		unicodeCharToBinValue($nameArr[13]),
		unicodeCharToBinValue($nameArr[14]),
		unicodeCharToBinValue($nameArr[15]));
	fwrite($fh, $data);
	for ($i = 0; $i < 32; $i++) {
		fwrite($fh,
			pack('v', count($contactArr) > $i ? $contactArr[$i] : 0));
	}
}

function writeRDTScanList($fh, $scanListNum, $name, $sigHoldTimeMS, $prioritySampleTimeMS, $priorityCh1, $priorityCh2, $txDesigCh, $channelArr) {
	fseek($fh, 0x18A85 + (104 * ($scanListNum-1)));
	$nameArr = createUnicodeStrArr($name, 16);
	$sigHoldTime = $sigHoldTimeMS / 25;
	if ($sigHoldTime < 2) {
		$sigHoldTime = 2;
	} else if ($sigHoldTime > 255) {
		$sigHoldTime = 255;
	}
	$prioritySampleTime = $prioritySampleTimeMS / 250;
	if ($prioritySampleTime < 3) {
		$prioritySampleTime = 3;
	} else if ($prioritySampleTime > 31) {
		$prioritySampleTime = 31;
	}
	$data = pack("vvvvvvvvvvvvvvvvvvvCCCC",
			unicodeCharToBinValue($nameArr[0]),
			unicodeCharToBinValue($nameArr[1]),
			unicodeCharToBinValue($nameArr[2]),
			unicodeCharToBinValue($nameArr[3]),
			unicodeCharToBinValue($nameArr[4]),
			unicodeCharToBinValue($nameArr[5]),
			unicodeCharToBinValue($nameArr[6]),
			unicodeCharToBinValue($nameArr[7]),
			unicodeCharToBinValue($nameArr[8]),
			unicodeCharToBinValue($nameArr[9]),
			unicodeCharToBinValue($nameArr[10]),
			unicodeCharToBinValue($nameArr[11]),
			unicodeCharToBinValue($nameArr[12]),
			unicodeCharToBinValue($nameArr[13]),
			unicodeCharToBinValue($nameArr[14]),
			unicodeCharToBinValue($nameArr[15]),
			$priorityCh1,
			$priorityCh2,
			$txDesigCh,
			0xF1,
			$sigHoldTime,
			$prioritySampleTime,
			0xFF);
	fwrite($fh, $data);
	for ($i = 0; $i < 31; $i++) {
		fwrite($fh,
				pack('v', count($channelArr) > $i ? $channelArr[$i] : 0));
	}
}

function writeRDTZoneInfo($fh, $zoneNum, $zoneName, &$channelNames, &$channelArr) {
	fseek($fh, 0x14C05 + (64 * ($zoneNum-1)));
	$nameArr = createUnicodeStrArr($zoneName, 16);
	$data = pack("vvvvvvvvvvvvvvvv",
			unicodeCharToBinValue($nameArr[0]),
			unicodeCharToBinValue($nameArr[1]),
			unicodeCharToBinValue($nameArr[2]),
			unicodeCharToBinValue($nameArr[3]),
			unicodeCharToBinValue($nameArr[4]),
			unicodeCharToBinValue($nameArr[5]),
			unicodeCharToBinValue($nameArr[6]),
			unicodeCharToBinValue($nameArr[7]),
			unicodeCharToBinValue($nameArr[8]),
			unicodeCharToBinValue($nameArr[9]),
			unicodeCharToBinValue($nameArr[10]),
			unicodeCharToBinValue($nameArr[11]),
			unicodeCharToBinValue($nameArr[12]),
			unicodeCharToBinValue($nameArr[13]),
			unicodeCharToBinValue($nameArr[14]),
			unicodeCharToBinValue($nameArr[15]));
	fwrite($fh, $data);
	for ($i = 0; $i < 16; $i++) {
		$chanValue = 0;
		if (count($channelNames) > $i) {
			$chanValue = findChannelNameIndex($channelArr, $channelNames[$i]);
		}
		fwrite($fh, pack('v', $chanValue));
	}
}

function writeRDTChannel($fh, $channelNum, $channel, &$contactArr, &$scanListArr, &$groupListArr) {
	// BCD = little endian = v
	// RevBCD = big endian = n
	fseek($fh, 0x1F025 + (64 * ($channelNum-1)));

	$isDigital = ($channel->getMode() == 'Digital');
	$aByte1 = 0b01000000;
	$aByte1 |= ($channel->isLoneWorker() ? 0b10000000: 0);
	$aByte1 |= ($channel->getSquelch() == 'Normal' ? 0b00100000 : 0);
	$aByte1 |= ($channel->isAutoScan()? 0b00010000 : 0);
	$aByte1 |= ($channel->getBandwidth() == '25.0' ? 0b00001000 : 0);
	$aByte1 |= ($isDigital ? 0b00000010 : 0b00000001);

	$aByte2 = 0x00;
	$aByte2 |= $channel->getColorCode() << 4;
	$aByte2 |= $channel->getSlot() == 'TS2' ? 0b00001000 : 0b00000100;
	$aByte2 |= $channel->isRxOnly() ? 0b00000010 : 0;
	$aByte2 |= $channel->isAllowTalkaround() ? 0b00000001 : 0;

	$aByte3 = 0x00;
	$aByte3 |= $channel->isDataCallConf() ? 0b10000000 : 0;
	$aByte3 |= $channel->isPrivateCallConf() ? 0b01000000 : 0;

	$aByte4 = 0b00100000;
	if (!$isDigital) {
		$aByte4 |= $channel->isDisplayPttId() ? 0 : 0b10000000;
	} else {
		$aByte4 |= 0b10000000;
	}
	$aByte4 |= ($isDigital && $channel->isCompressedUdpHeader()) ? 0: 0b01000000;
	if ($channel->getRxRefFrequency() == 'Medium') {
		$aByte4 |= 0b00000001;
	} else if ($channel->getRxRefFrequency() == 'High') {
		$aByte4 |= 0b00000010;
	}

	$aByte5 = 0x00;
	if ($channel->getAdmitCriteria() == 'Channel Free') {
		$aByte5 |= 0b01000000;
	} else if ($channel->getAdmitCriteria() == 'CTCSS/DCS') {
		$aByte5 |= 0b10000000;
	} else if ($channel->getAdmitCriteria() == 'Color Code') {
		$aByte5 |= 0b11000000;
	}
	$aByte5 |= $channel->getPower() == 'Low' ? 0 : 0b00100000;
	$aByte5 |= $channel->isVox()? 0b00010000 : 0;
	$aByte5 |= $channel->getQtReverse() == '120' ? 0b00001000 : 0;
	$aByte5 |= ($isDigital || $channel->isReverseBurst()) ? 0b00000100 : 0;
	if ($channel->getTxRefFrequency() == 'Medium') {
		$aByte5 |= 0b00000001;
	} else if ($channel->getTxRefFrequency() == 'High') {
		$aByte5 |= 0b00000010;
	}

	$contactIndex = findContactNameIndex($contactArr, $channel->getContactName());
	$totCode = round($channel->getTot() / 15) & 0b00111111;
	$totRekeyDelay = $channel->getTotRekeyDelay() & 0xFF;
	$scanListIndex = findScanListIndex($scanListArr, $channel->getScanListName());
	$groupListIndex = findGroupListIndex($groupListArr, $channel->getGroupListName());

	if (!$isDigital && $channel->getDecode18() != NULL) {
		$aByte6 = $channel->getDecode18();
	} else {
		$aByte6 = 0;
	}

	$rxFreqCode = createFrequencyBCD($channel->getRxFrequency());
	$txFreqCode = createFrequencyBCD($channel->getTxFrequency());
	if (!$isDigital) {
		$toneDecode = createToneBCDT($channel->getCtcssDcsDecode());
		$toneEncode = createToneBCDT($channel->getCtcssDcsEncode());
	} else {
		$toneDecode = 0xFFFF;
		$toneEncode = 0xFFFF;
	}

	$txSignal = 0;
	if ($channel->getTxSignalingSystem() != NULL) {
		if ("DTMF-1" == $channel->getTxSignalingSystem()) $txSignal = 0x01;
		if ("DTMF-2" == $channel->getTxSignalingSystem()) $txSignal = 0x02;
		if ("DTMF-3" == $channel->getTxSignalingSystem()) $txSignal = 0x03;
		if ("DTMF-4" == $channel->getTxSignalingSystem()) $txSignal = 0x04;
	}

	$rxSignal = 0;
	if ($channel->getRxSignalingSystem() != NULL) {
		if ("DTMF-1" == $channel->getRxSignalingSystem()) $rxSignal = 0x01;
		if ("DTMF-2" == $channel->getRxSignalingSystem()) $rxSignal = 0x02;
		if ("DTMF-3" == $channel->getRxSignalingSystem()) $rxSignal = 0x03;
		if ("DTMF-4" == $channel->getRxSignalingSystem()) $rxSignal = 0x04;
	}

	$nameArr = createUnicodeStrArr($channel->getChannelName(), 16);
	$data = pack('CCCC'.'CCv'.'CCCC'.'CCCC'.'V'.'V'.'vv'.'CCCC'.'vvvvvvvvvvvvvvvv',
			$aByte1, $aByte2, $aByte3, $aByte4, /* 0 - 31 */
			$aByte5, 0xC3, $contactIndex, /* 32 - 63 */
			$totCode, $totRekeyDelay, 0, $scanListIndex, /* 64 - 95 */
			$groupListIndex, 0x01, $aByte6, 0xFF, /* 96 - 127 */
			$rxFreqCode, /* 128 - 159 */
			$txFreqCode, /* 160 - 191 */
			$toneDecode, $toneEncode, /* 192 - 223 */
			$txSignal, $rxSignal, 0xFF, 0xFF, /* 224 - 255 */
			unicodeCharToBinValue($nameArr[0]),
			unicodeCharToBinValue($nameArr[1]),
			unicodeCharToBinValue($nameArr[2]),
			unicodeCharToBinValue($nameArr[3]),
			unicodeCharToBinValue($nameArr[4]),
			unicodeCharToBinValue($nameArr[5]),
			unicodeCharToBinValue($nameArr[6]),
			unicodeCharToBinValue($nameArr[7]),
			unicodeCharToBinValue($nameArr[8]),
			unicodeCharToBinValue($nameArr[9]),
			unicodeCharToBinValue($nameArr[10]),
			unicodeCharToBinValue($nameArr[11]),
			unicodeCharToBinValue($nameArr[12]),
			unicodeCharToBinValue($nameArr[13]),
			unicodeCharToBinValue($nameArr[14]),
			unicodeCharToBinValue($nameArr[15])
			);
	fwrite($fh, $data);
}

function writeRDTTextMessage($fh, $textNum, $text) {
	fseek($fh, 0x23A5 + (288 * ($textNum-1)));
	$textArr = createUnicodeStrArr($text, 144);
	for ($i = 0; $i < 144; $i++) {
		fwrite($fh, pack('v', unicodeCharToBinValue($textArr[$i])));
	}
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

function convertToneBCDTToString($bcdt) {
	if ($bcdt == 0xFFFF) {
		return '';
	}

	$type = 'C';
	if (($bcdt & 0xC000) == 0xC000) {
		$type = 'I';
	} else if (($bcdt & 0x8000) == 0x8000) {
		$type = 'N';
	}

	if ($type == 'C') {
		return '' . (($bcdt >> 12) & 0x0F) . (($bcdt >> 8) & 0x0F) . (($bcdt >> 4) & 0x0F) . '.' . ($bcdt & 0x0F);
	} else {
		return 'D' . (($bcdt >> 8) & 0x0F) . (($bcdt >> 4) & 0x0F) . ($bcdt & 0x0F) . $type;
	}
}

function createRevBCD($value) {
	$digits = str_split($value);
	$retval = 0x00;
	for ($i = 0; $i < count($digits); $i++) {
		$retval = ($retval << 4) + $digits[$i];
	}
	return $retval;
}

function createFrequencyBCD($freq) {
	$freqParts = explode('.', $freq);
	$freqParts[1] = str_pad($freqParts[1], 5, '0', STR_PAD_RIGHT);
	if (strlen($freqParts[1] > 5)) {
		$freqParts[1] = substr($freqParts[1], 0, 5);
	}
	$digits = str_split($freqParts[0] . $freqParts[1]);
	$result = 0x00;
	for ($i = 0; $i < count($digits); $i++) {
		$result = ($result << 4) + $digits[$i];
	}
	return $result;
}

function convertBCDToFrequency($bcd) {
	$result = '';
	$result = $result . (($bcd >> 28) & 0x0F) . (($bcd >> 24) & 0x0F);
	$result = $result . (($bcd >> 20) & 0x0F) . '.' . (($bcd >> 16) & 0x0F);
	$result = $result . (($bcd >> 12) & 0x0F) . (($bcd >> 8) & 0x0F);
	$result = $result . ($bcd & 0x0F) . (($bcd >> 4) & 0x0F);
	return $result;
}

function findContactNameIndex(&$contactArr, $contactName) {
	$rowNum = 1;
	foreach ($contactArr as $contact) {
		if ($contact->getContactName() == $contactName) {
			return $rowNum;
		}
		$rowNum++;
	}
	return 0;
}

function findContactNameFromOriginalIndex(&$contactArr, $origIndex) {
	foreach ($contactArr as $contact) {
		if ($contact->getOriginalIndex() == $origIndex) {
			return $contact->getContactName();
		}
	}
	return NULL;
}

function findChannelNameFromOriginalIndex(&$channelArr, $origIndex) {
	foreach ($channelArr as $channel) {
		if ($channel->getOriginalIndex() == $origIndex) {
			return $channel->getChannelName();
		}
	}
	return NULL;
}

function findRxGroupListNameFromOriginalIndex(&$rxGrpListArr, $origIndex) {
	foreach ($rxGrpListArr as $rxGrpList) {
		if ($rxGrpList->getOriginalIndex() == $origIndex) {
			return $rxGrpList->getGroupListName();
		}
	}
	return NULL;
}

function findScanListNameFromOriginalIndex(&$scanListArr, $origIndex) {
	foreach ($scanListArr as $scanList) {
		if ($scanList->getOriginalIndex() == $origIndex) {
			return $scanList->getScanListName();
		}
	}
	return NULL;
}


function findChannelNameIndex(&$channelArr, $channelName) {
	$rowNum = 1;
	foreach ($channelArr as $channel) {
		if ($channel->getChannelName() == $channelName) {
			return $rowNum;
		}
		$rowNum++;
	}
	return 0;
}

function findGroupListIndex(&$groupListArr, $groupListName) {
	$rowNum = 1;
	foreach ($groupListArr as $groupList) {
		if ($groupList->getGroupListName() == $groupListName) {
			return $rowNum;
		}
		$rowNum++;
	}
	return 0;
}

function findScanListIndex(&$scanListArr, $scanListName) {
	if ($scanListName == '') {
		return 0;
	}
	$rowNum = 1;
	foreach ($scanListArr as $scanList) {
		if ($scanList->getScanListName() == $scanListName) {
			return $rowNum;
		}
		$rowNum++;
	}
	return 0;
}

function readMenuItems($baseValues, $personalValues) {
	$menuItemsMap = array();

	if (count($baseValues) != 0) {
		processKeyValueRow($menuItemsMap, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processKeyValueRow($menuItemsMap, $personalValues);
	}

	$menuItems = new MenuItem(
			array_key_exists(ROW_MENU_TEXT_MESSAGE, $menuItemsMap) ? $menuItemsMap[ROW_MENU_TEXT_MESSAGE] : NULL,
			array_key_exists(ROW_MENU_CALL_ALERT, $menuItemsMap) ? $menuItemsMap[ROW_MENU_CALL_ALERT] : NULL,
			array_key_exists(ROW_MENU_MANUAL_DIAL, $menuItemsMap) ? $menuItemsMap[ROW_MENU_MANUAL_DIAL] : NULL,
			array_key_exists(ROW_MENU_REMOTE_MONITOR, $menuItemsMap) ? $menuItemsMap[ROW_MENU_REMOTE_MONITOR] : NULL,
			array_key_exists(ROW_MENU_RADIO_ENABLE, $menuItemsMap) ? $menuItemsMap[ROW_MENU_RADIO_ENABLE] : NULL,
			array_key_exists(ROW_MENU_EDIT, $menuItemsMap) ? $menuItemsMap[ROW_MENU_EDIT] : NULL,
			array_key_exists(ROW_MENU_RADIO_CHECK, $menuItemsMap) ? $menuItemsMap[ROW_MENU_RADIO_CHECK] : NULL,
			array_key_exists(ROW_MENU_PROGRAM_KEY, $menuItemsMap) ? $menuItemsMap[ROW_MENU_PROGRAM_KEY] : NULL,
			array_key_exists(ROW_MENU_RADIO_DISABLE, $menuItemsMap) ? $menuItemsMap[ROW_MENU_RADIO_DISABLE] : NULL,
			array_key_exists(ROW_MENU_MISSED, $menuItemsMap) ? $menuItemsMap[ROW_MENU_MISSED] : NULL,
			array_key_exists(ROW_MENU_OUTGOING_RADIO, $menuItemsMap) ? $menuItemsMap[ROW_MENU_OUTGOING_RADIO] : NULL,
			array_key_exists(ROW_MENU_ANSWERED, $menuItemsMap) ? $menuItemsMap[ROW_MENU_ANSWERED] : NULL,
			array_key_exists(ROW_MENU_TALKAROUND, $menuItemsMap) ? $menuItemsMap[ROW_MENU_TALKAROUND] : NULL,
			array_key_exists(ROW_MENU_POWER, $menuItemsMap) ? $menuItemsMap[ROW_MENU_POWER] : NULL,
			array_key_exists(ROW_MENU_INTRO_SCREEN, $menuItemsMap) ? $menuItemsMap[ROW_MENU_INTRO_SCREEN] : NULL,
			array_key_exists(ROW_MENU_LED_INDICATOR, $menuItemsMap) ? $menuItemsMap[ROW_MENU_LED_INDICATOR] : NULL,
			array_key_exists(ROW_MENU_PASSWORD_AND_LOCK, $menuItemsMap) ? $menuItemsMap[ROW_MENU_PASSWORD_AND_LOCK] : NULL,
			array_key_exists(ROW_MENU_DISPLAY_MODE, $menuItemsMap) ? $menuItemsMap[ROW_MENU_DISPLAY_MODE] : NULL,
			array_key_exists(ROW_MENU_TONE_OR_ALERT, $menuItemsMap) ? $menuItemsMap[ROW_MENU_TONE_OR_ALERT] : NULL,
			array_key_exists(ROW_MENU_BACKLIGHT, $menuItemsMap) ? $menuItemsMap[ROW_MENU_BACKLIGHT] : NULL,
			array_key_exists(ROW_MENU_KEYBOARD_LOCK, $menuItemsMap) ? $menuItemsMap[ROW_MENU_KEYBOARD_LOCK] : NULL,
			array_key_exists(ROW_MENU_SQUELCH, $menuItemsMap) ? $menuItemsMap[ROW_MENU_SQUELCH] : NULL,
			array_key_exists(ROW_MENU_VOX, $menuItemsMap) ? $menuItemsMap[ROW_MENU_VOX] : NULL,
			array_key_exists(ROW_MENU_PROGRAM_RADIO, $menuItemsMap) ? $menuItemsMap[ROW_MENU_PROGRAM_RADIO] : NULL,
			array_key_exists(ROW_MENU_SCAN, $menuItemsMap) ? $menuItemsMap[ROW_MENU_SCAN] : NULL,
			array_key_exists(ROW_MENU_EDIT_LIST, $menuItemsMap) ? $menuItemsMap[ROW_MENU_EDIT_LIST] : NULL,
			array_key_exists(ROW_MENU_MENU_HANG_TIME, $menuItemsMap) ? $menuItemsMap[ROW_MENU_MENU_HANG_TIME] : NULL
			);
	if (!is_numeric($menuItems->getMenuHangTime()) || $menuItems->getMenuHangTime() < 0 || $menuItems->getMenuHangTime() > 30) {
		addError("Menu Items menu hang time setting is invalid");
	}

	return $menuItems;
}

function processKeyValueRow(&$settingsMap, $values) {
	foreach ($values as $row) {
		if (count($row) < 2 || $row[1] == NULL) {
			continue;
		}
		$settingsMap[$row[0]] = $row[1];
	}
}

function readGeneralSettings($baseValues, $personalValues) {
	$genSettingsMap = array();

	if (count($baseValues) != 0) {
		processKeyValueRow($genSettingsMap, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processKeyValueRow($genSettingsMap, $personalValues);
	}

	$settings = new GeneralSettings(
			array_key_exists(ROW_GENERAL_INFO1, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_INFO1] : NULL,
			array_key_exists(ROW_GENERAL_INFO2, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_INFO2] : NULL,
			array_key_exists(ROW_GENERAL_MONITOR_TYPE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_MONITOR_TYPE] : NULL,
			array_key_exists(ROW_GENERAL_DISABLE_LEDS, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_DISABLE_LEDS] : NULL,
			array_key_exists(ROW_GENERAL_TALK_PERMIT_TONE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_TALK_PERMIT_TONE] : NULL,
			array_key_exists(ROW_GENERAL_PASSWORD_ENABLE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_PASSWORD_ENABLE] : NULL,
			array_key_exists(ROW_GENERAL_CH_FREE_TONE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_CH_FREE_TONE] : NULL,
			array_key_exists(ROW_GENERAL_DISABLE_ALL_TONE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_DISABLE_ALL_TONE] : NULL,
			array_key_exists(ROW_GENERAL_SAVE_MODE_RECV, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_SAVE_MODE_RECV] : NULL,
			array_key_exists(ROW_GENERAL_SAVE_PREAMBLE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_SAVE_PREAMBLE] : NULL,
			array_key_exists(ROW_GENERAL_INTRO_SCREEN, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_INTRO_SCREEN] : NULL,
			array_key_exists(ROW_GENERAL_RADIO_ID, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_RADIO_ID] : NULL,
			array_key_exists(ROW_GENERAL_TX_PREAMBLE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_TX_PREAMBLE] : NULL,
			array_key_exists(ROW_GENERAL_GROUP_CALL_HANG_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_GROUP_CALL_HANG_TIME] : NULL,
			array_key_exists(ROW_GENERAL_PRIVATE_CALL_HANG_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_PRIVATE_CALL_HANG_TIME] : NULL,
			array_key_exists(ROW_GENERAL_VOX_SENSITIVITY, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_VOX_SENSITIVITY] : NULL,
			array_key_exists(ROW_GENERAL_RX_LOW_BATT, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_RX_LOW_BATT] : NULL,
			array_key_exists(ROW_GENERAL_CALL_ALERT_TONE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_CALL_ALERT_TONE] : NULL,
			array_key_exists(ROW_GENERAL_LONE_WORKER_RESP, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_LONE_WORKER_RESP] : NULL,
			array_key_exists(ROW_GENERAL_LONE_WORKER_REMIND, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_LONE_WORKER_REMIND] : NULL,
			array_key_exists(ROW_GENERAL_SCAN_DIGITAL_HANG_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_SCAN_DIGITAL_HANG_TIME] : NULL,
			array_key_exists(ROW_GENERAL_SCAN_ANALOG_HANG_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_SCAN_ANALOG_HANG_TIME] : NULL,
			array_key_exists(ROW_GENERAL_KEYPAD_LOCK_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_KEYPAD_LOCK_TIME] : NULL,
			array_key_exists(ROW_GENERAL_BACKLIGHT_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_BACKLIGHT_TIME] : NULL,
			array_key_exists(ROW_GENERAL_MODE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_MODE] : NULL,
			array_key_exists(ROW_GENERAL_POWER_ON_PASSWORD, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_POWER_ON_PASSWORD] : NULL,
			array_key_exists(ROW_GENERAL_RADIO_PROGRAM_PASSWORD, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_RADIO_PROGRAM_PASSWORD] : NULL,
			array_key_exists(ROW_GENERAL_PC_PROGRAM_PASSWORD, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_PC_PROGRAM_PASSWORD] : NULL,
			array_key_exists(ROW_GENERAL_RADIO_NAME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_RADIO_NAME] : NULL);

	return $settings;
}

function processContactRows(&$contactArr, $values) {
	foreach ($values as $row) {
		$contactArr[] = new Contact($row[0], $row[1], $row[2], $row[3] === 'Y'); 
	}
}

function readContactList($baseValues, $personalValues) {
	$contactArr = array();

	if (count($baseValues) != 0) {
		processContactRows($contactArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
			processContactRows($contactArr, $personalValues);
	}

	return $contactArr;
}

function writeContacts($fh, $contactArr) {
	$contactCount = min(count($contactArr), 1000);
	for ($contactRowNum = 0; $contactRowNum < $contactCount; $contactRowNum++) {
		$contact = $contactArr[$contactRowNum];
		writeRDTDigitalContact($fh, $contactRowNum+1, $contact->getContactNum(), $contact->getContactType(), $contact->getContactName(), $contact->isCallReceiveTone());
	}
}

function processRxGroupListRows(&$groupListArr, $values) {
	foreach ($values as $row) {
		$contactArr = array();
		for ($ci = 0; $ci < 32 && ($ci + 1) < count($row) &&  $row[$ci + 1] != NULL && $row[$ci + 1] != ''; $ci++) {
			$contactArr[] = $row[$ci + 1];
		}
		$groupListArr[] = new RxGroupList($row[0], $contactArr);
	}
}

function readRxGroupLists($baseValues, $personalValues) {
	$listArr = array();

	if (count($baseValues) != 0) {
		processRxGroupListRows($listArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
			processRxGroupListRows($listArr, $personalValues);
	}

	return $listArr;
}

function writeRxGroupLists($fh, $groupListArr, $contactArr) {
	$cNameArr = array();
	foreach ($contactArr as $contact) {
		$cNameArr[] = $contact->getContactName();
	}
	$groupListCount = min(count($groupListArr), 250);
	for ($groupListRowNum = 0; $groupListRowNum < $groupListCount; $groupListRowNum++) {
		$groupList = $groupListArr[$groupListRowNum];
		$ciArr = array();
		$contactNamesForList = $groupList->getContactNames();
		foreach ($contactNamesForList as $cName) {
			$index = array_search($cName, $cNameArr);
			if ($index === false) {
				addError("Rx group list ".$groupList->getGroupListName()." has unmatched contact ".$cName);
			}
			$ciArr[] = $index + 1;
		}
		writeRDTRxGroupList($fh, $groupListRowNum+1, $groupList->getGroupListName(), $ciArr);
	}
}

function processScanListRows(&$scanListArr, $values) {
	foreach ($values as $row) {
		if (count($row) < 7 || $row[0] == NULL || $row[0] == '') {
			continue;
		}
		$channelArr = array();
		if (count($row) > 7) {
			for ($ci = 0; $ci < 33 && ($ci + 7) < count($row) && $row[$ci + 7] != NULL && $row[$ci + 7] != ''; $ci++) {
				$channelArr[] = $row[$ci + 7];
			}
		}
		$scanListArr[] = new ScanList($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $channelArr);
	}
}

function readScanLists($baseValues, $personalValues) {
	$listArr = array();

	if (count($baseValues) != 0) {
		processScanListRows($listArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
			processScanListRows($listArr, $personalValues);
	}

	return $listArr;
}

function writeScanLists($fh, $scanListArr, $channelArr) {
	$cNameArr = array();
	foreach ($channelArr as $channel) {
		$cNameArr[] = $channel->getChannelName();
	}
	$scanListCount = min(count($scanListArr), 250);
	for ($scanListRowNum = 0; $scanListRowNum < $scanListCount; $scanListRowNum++) {
		$scanList = $scanListArr[$scanListRowNum];
		$ciArr = array();
		$channelNamesForList = $scanList->getChannelNames();
		foreach ($channelNamesForList as $cName) {
			$ciArr[] = array_search($cName, $cNameArr) + 1;
		}

		if ($scanList->getPriorityChannel1() == 'None') {
			$priCh1 = 65535;
		} else if ($scanList->getPriorityChannel1() == 'Selected') {
			$priCh1 = 0;
		} else {
			$priCh1 = array_search($scanList->getPriorityChannel1(), $cNameArr) + 1;
			if ($priCh1 === false) {
				addError("Scan list ".$scanList->getScanListName()." priority channel 1 not found");
			}
		}

		$priCh2 = 65535;
		if ($priCh1 != 65535) {
			if ($scanList->getPriorityChannel2() == 'None') {
				$priCh2 = 65535;
			} else if ($scanList->getPriorityChannel2() == 'Selected') {
				$priCh2 = 0;
			} else {
				$priCh2 = array_search($scanList->getPriorityChannel2(), $cNameArr) + 1;
				if ($priCh2 === false) {
					addError("Scan list ".$scanList->getScanListName()." priority channel 2 not found");
				}
			}
		}

		if ($scanList->getTxDesignatedChannel() == 'Last') {
			$txDesigCh = 65535;
		} else if ($scanList->getTxDesignatedChannel() == 'Selected') {
			$txDesigCh = 0;
		} else {
			$txDesigCh = array_search($scanList->getTxDesignatedChannel(), $cNameArr) + 1;
			if ($txDesigCh === false) {
				addError("Scan list ".$scanList->getScanListName()." designated tx channel not found");
			}
		}
		writeRDTScanList($fh, $scanListRowNum+1, $scanList->getScanListName(), 
				$scanList->getSignalHoldTime(), $scanList->getPrioritySampleTime(),
				$priCh1, $priCh2, $txDesigCh,
				$ciArr);
	}
}

function readChannelColumns($channelColumns) {
	$row = $channelColumns[0];
	$rowCount = count($row);
	$columnMap = array();

	for ($i = 0; $i < $rowCount; $i++) {
		$columnMap[$row[$i]] = $i;
	}

	return $columnMap;
}

function readChannelList($baseValues, $baseChannelColumns, $personalValues, $personalChannelColumns) {
	$channelArr = array();

	$baseColumnMap = readChannelColumns($baseChannelColumns);
	if (count($baseValues) != 0) {
		$channelArr = processChannelRows($channelArr, $baseValues, $baseColumnMap);
	}

	if ($personalValues != null) {
		$personalColumnMap = readChannelColumns($personalChannelColumns);

		if (count($personalValues) != 0) {
			$channelArr = processChannelRows($channelArr, $personalValues, $personalColumnMap);
		}
	}

	return $channelArr;
}

function processChannelRows(&$channelArr, $values, &$columnMap) {
	foreach ($values as $row) {
		$rowSize = count($row);
		$channel = new Channel(
				$rowSize > $columnMap[COL_CHANNEL_NAME] ? $row[$columnMap[COL_CHANNEL_NAME]] : NULL, //$channelName
				$rowSize > $columnMap[COL_CHANNEL_LONE_WORKER] ? $row[$columnMap[COL_CHANNEL_LONE_WORKER]] === 'On' : FALSE, //$isLoneWorker
				$rowSize > $columnMap[COL_CHANNEL_SQUELCH] ? $row[$columnMap[COL_CHANNEL_SQUELCH]] : NULL, //$squelch
				$rowSize > $columnMap[COL_CHANNEL_AUTOSCAN] ? $row[$columnMap[COL_CHANNEL_AUTOSCAN]] === 'On' : FALSE, //$isAutoScan
				$rowSize > $columnMap[COL_CHANNEL_BANDWIDTH] ? $row[$columnMap[COL_CHANNEL_BANDWIDTH]] : NULL, //$bandwidth
				$rowSize > $columnMap[COL_CHANNEL_CHANNEL_MODE] ? $row[$columnMap[COL_CHANNEL_CHANNEL_MODE]] : NULL, //$mode
				$rowSize > $columnMap[COL_CHANNEL_COLOR_CODE] ? $row[$columnMap[COL_CHANNEL_COLOR_CODE]] : NULL, //$colorCode
				$rowSize > $columnMap[COL_CHANNEL_REPEATER_SLOT] ? $row[$columnMap[COL_CHANNEL_REPEATER_SLOT]] : NULL, //$slot
				$rowSize > $columnMap[COL_CHANNEL_RX_ONLY] ? $row[$columnMap[COL_CHANNEL_RX_ONLY]] === 'On' : FALSE, //$isRxOnly
				$rowSize > $columnMap[COL_CHANNEL_ALLOW_TALKAROUND] ? $row[$columnMap[COL_CHANNEL_ALLOW_TALKAROUND]] === 'On' : FALSE, //$isAllowTalkaround
				$rowSize > $columnMap[COL_CHANNEL_DATA_CALL_CONFIRMED] ? $row[$columnMap[COL_CHANNEL_DATA_CALL_CONFIRMED]] === 'On' : FALSE, //$isDataCallConf
				$rowSize > $columnMap[COL_CHANNEL_PRIVATE_CALL_CONFIRMED] ? $row[$columnMap[COL_CHANNEL_PRIVATE_CALL_CONFIRMED]] === 'On' : FALSE, //$isPrivateCallConf
				$rowSize > $columnMap[COL_CHANNEL_DISPLAY_PTT_ID] ? $row[$columnMap[COL_CHANNEL_DISPLAY_PTT_ID]] === 'On' : FALSE, //$isDisplayPttId
				$rowSize > $columnMap[COL_CHANNEL_COMPRESSED_UDP_HEADER] ? $row[$columnMap[COL_CHANNEL_COMPRESSED_UDP_HEADER]] === 'On' : FALSE, //$isCompressedUdpHeader
				$rowSize > $columnMap[COL_CHANNEL_RX_REF_FREQ] ? $row[$columnMap[COL_CHANNEL_RX_REF_FREQ]] : NULL, //$rxRefFrequency
				$rowSize > $columnMap[COL_CHANNEL_ADMIT_CRITERIA] ? $row[$columnMap[COL_CHANNEL_ADMIT_CRITERIA]] : NULL, //$admitCriteria
				$rowSize > $columnMap[COL_CHANNEL_POWER] ? $row[$columnMap[COL_CHANNEL_POWER]] : NULL, //$power
				$rowSize > $columnMap[COL_CHANNEL_VOX] ? $row[$columnMap[COL_CHANNEL_VOX]] === 'On' : FALSE, //$isVox
				$rowSize > $columnMap[COL_CHANNEL_QT_REVERSE] ? $row[$columnMap[COL_CHANNEL_QT_REVERSE]] : NULL, //$qtReverse
				$rowSize > $columnMap[COL_CHANNEL_REVERSE_BURST] ? $row[$columnMap[COL_CHANNEL_REVERSE_BURST]] === 'On' : FALSE, //$isReverseBurst
				$rowSize > $columnMap[COL_CHANNEL_TX_REF_FREQ] ? $row[$columnMap[COL_CHANNEL_TX_REF_FREQ]] : NULL, //$txRefFrequency
				$rowSize > $columnMap[COL_CHANNEL_CONTACT_NAME] ? $row[$columnMap[COL_CHANNEL_CONTACT_NAME]] : NULL, //$contactName
				$rowSize > $columnMap[COL_CHANNEL_TOT] ? $row[$columnMap[COL_CHANNEL_TOT]] : NULL, //$tot
				$rowSize > $columnMap[COL_CHANNEL_TOT_REKEY_DELAY] ? $row[$columnMap[COL_CHANNEL_TOT_REKEY_DELAY]] : NULL, //$totRekeyDelay
				$rowSize > $columnMap[COL_CHANNEL_SCAN_LIST] ? $row[$columnMap[COL_CHANNEL_SCAN_LIST]] : NULL, //$scanListName
				$rowSize > $columnMap[COL_CHANNEL_GROUP_LIST] ? $row[$columnMap[COL_CHANNEL_GROUP_LIST]] : NULL, //$groupListName
				$rowSize > $columnMap[COL_CHANNEL_DECODE18] ? $row[$columnMap[COL_CHANNEL_DECODE18]] : NULL, //$decode18
				$rowSize > $columnMap[COL_CHANNEL_RX_FREQ] ? $row[$columnMap[COL_CHANNEL_RX_FREQ]] : NULL, //$rxFrequency
				$rowSize > $columnMap[COL_CHANNEL_TX_FREQ] ? $row[$columnMap[COL_CHANNEL_TX_FREQ]] : NULL, //$txFrequency
				$rowSize > $columnMap[COL_CHANNEL_CTCSS_DCS_DECODE] ? $row[$columnMap[COL_CHANNEL_CTCSS_DCS_DECODE]] : NULL, //$ctcssDcsDecode
				$rowSize > $columnMap[COL_CHANNEL_CTCSS_DCS_ENCODE] ? $row[$columnMap[COL_CHANNEL_CTCSS_DCS_ENCODE]] : NULL, //$ctcssDcsEncode
				$rowSize > $columnMap[COL_CHANNEL_TX_SIGNALING_SYSTEM] ? $row[$columnMap[COL_CHANNEL_TX_SIGNALING_SYSTEM]] : NULL, //$txSignalingSystem
				$rowSize > $columnMap[COL_CHANNEL_RX_SIGNALING_SYSTEM] ? $row[$columnMap[COL_CHANNEL_RX_SIGNALING_SYSTEM]] : NULL //$rxSignalingSystem
				);
		if (strlen($channel->getChannelName()) > 16) {
			addError("Channel name too long: ".$channel->getChannelName());
		}
		if ($channel->getMode() != 'Digital' && $channel->getMode() != 'Analog') {
			addError("Invalid channel mode for channel ".$channel->getChannelName().': '.$channel->getMode());
		}
		if ($channel->getSquelch() != 'Normal' && $channel->getSquelch() != 'Tight') {
			addError("Invalid squelch setting for channel ".$channel->getChannelName().': '.$channel->getSquelch());
		}
		if ($channel->getBandwidth() != '12.5' && $channel->getBandwidth() != '25.0') {
			addError("Invalid bandwidth setting for channel ".$channel->getChannelName().': '.$channel->getBandwidth());
		}
		if ($channel->getRxRefFrequency() != 'Low' && $channel->getRxRefFrequency() != 'Medium' && $channel->getRxRefFrequency() != 'High') {
			addError("Invalid rx reference frequency setting for channel ".$channel->getChannelName().': '.$channel->getRxRefFrequency());
		}
		if ($channel->getTxRefFrequency() != 'Low' && $channel->getTxRefFrequency() != 'Medium' && $channel->getTxRefFrequency() != 'High') {
			addError("Invalid tx reference frequency setting for channel ".$channel->getChannelName().': '.$channel->getTxRefFrequency());
		}
		if ($channel->getAdmitCriteria() != 'Always' && $channel->getAdmitCriteria() != 'Channel Free' && $channel->getAdmitCriteria() != 'CTCSS/DCS' && $channel->getAdmitCriteria() != 'Color Code') {
			addError("Invalid admit criteria setting for channel ".$channel->getChannelName().': '.$channel->getAdmitCriteria());
		}
		if ($channel->getPower() != 'Low' && $channel->getPower() != 'High') {
			addError("Invalid power setting for channel ".$channel->getChannelName().': '.$channel->getPower());
		}
		if (!is_numeric($channel->getTot()) || $channel->getTot() < 0 || $channel->getTot() >= 555 || $channel->getTot() % 15 != 0) {
			addError("Invalid TOT setting for channel ".$channel->getChannelName().': '.$channel->getTot());
		}
		if (!is_numeric($channel->getTotRekeyDelay()) || $channel->getTotRekeyDelay() < 0 || $channel->getTotRekeyDelay() > 255) {
			addError("Invalid TOT setting for channel ".$channel->getChannelName().': '.$channel->getTot());
		}
		if (!is_numeric($channel->getRxFrequency()) || $channel->getRxFrequency() < 400.0 || $channel->getRxFrequency() > 480.0) {
			addError("Invalid rx frequency setting for channel ".$channel->getChannelName().': '.$channel->getRxFrequency());
		}
		if (!is_numeric($channel->getTxFrequency()) || $channel->getTxFrequency() < 400.0 || $channel->getTxFrequency() > 480.0) {
			addError("Invalid tx frequency setting for channel ".$channel->getChannelName().': '.$channel->getTxFrequency());
		}
		if ($channel->getMode() == 'Digital') {
			if ($channel->getColorCode() < 0 || $channel->getColorCode() > 15) {
				addError("Invalid color code for channel ".$channel->getChannelName().': '.$channel->getColorCode());
			}
			if ($channel->getSlot() != 'TS1' && $channel->getSlot() != 'TS2') {
				addError("Invalid time slot setting for channel ".$channel->getChannelName().': '.$channel->getSlot());
			}
		} else if ($channel->getMode() == 'Analog') {
			if ($channel->getQtReverse() != '120' && $channel->getQtReverse() != '180') {
				addError("Invalid qt reverse setting for channel ".$channel->getChannelName().': '.$channel->getQtReverse());
			}
			if ((!is_numeric($channel->getDecode18()) || $channel->getDecode18() < 0 || $channel->getDecode18() > 255) && $channel->getDecode18() != '') {
				addError("Invalid Decode18 setting for channel ".$channel->getChannelName().': '.$channel->getDecode18());
			}
			if (!preg_match("/\d{2,3}.\d/", $channel->getCtcssDcsDecode()) && !preg_match("/D\d\d\d[NI]/", $channel->getCtcssDcsDecode()) && $channel->getCtcssDcsDecode() != '') {
				addError("Invalid CTCSS/DCS decode setting for channel ".$channel->getChannelName().': '.$channel->getCtcssDcsDecode());
			}
			if (!preg_match("/\d{2,3}.\d/", $channel->getCtcssDcsEncode()) && !preg_match("/D\d\d\d[NI]/", $channel->getCtcssDcsEncode()) && $channel->getCtcssDcsEncode() != '') {
				addError("Invalid CTCSS/DCS encode setting for channel ".$channel->getChannelName().': '.$channel->getCtcssDcsEncode());
			}
			if (!preg_match("/DTMF-[1234]/", $channel->getTxSignalingSystem()) && $channel->getTxSignalingSystem() != 'Off') {
				addError("Invalid tx signalling system setting for channel ".$channel->getChannelName().': '.$channel->getTxSignalingSystem());
			}
			if (!preg_match("/DTMF-[1234]/", $channel->getRxSignalingSystem()) && $channel->getRxSignalingSystem() != 'Off') {
				addError("Invalid rx signalling system setting for channel ".$channel->getChannelName().': '.$channel->getRxSignalingSystem());
			}
		}
		$channelArr[] = $channel;
	}

	return $channelArr;
}

function writeChannels($fh, $channelArr, $contactArr, $scanListArr, $groupListArr) {
	$channelCount = min(count($channelArr), 1000);
	for ($channelRowNum = 0; $channelRowNum < $channelCount; $channelRowNum++) {
		$channel = $channelArr[$channelRowNum];
		writeRDTChannel($fh, $channelRowNum+1, $channel, $contactArr, $scanListArr, $groupListArr);
	}
}

function processZoneInfoRow(&$zoneInfoArr, $values) {
	foreach ($values as $row) {
		if (count($row) < 1) {
			continue;
		}
		$channelArr = array();
		for ($ci = 1; $ci <= 16 && $ci < count($row) && $row[$ci] != NULL && $row[$ci] != ''; $ci++) {
			$channelArr[] = $row[$ci];
		}
		$zoneInfoArr[] = new ZoneInfo($row[0], $channelArr);
	}
}

function readZoneInfoList($baseValues, $personalValues) {
	$zoneArr = array();

	if (count($baseValues) != 0) {
		processZoneInfoRow($zoneArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
			processZoneInfoRow($zoneArr, $personalValues);
	}

	return $zoneArr;
}

function writeZoneInfoList($fh, $zoneArr, &$channelArr) {
	$zoneCount = min(count($zoneArr), 250);
	for ($zoneRowNum = 0; $zoneRowNum < $zoneCount; $zoneRowNum++) {
		$zone = $zoneArr[$zoneRowNum];
		writeRDTZoneInfo($fh, $zoneRowNum+1, $zone->getZoneName(), $zone->getChannelNames(), $channelArr);
	}
}

function readTextMessages($baseValues, $personalValues) {
	$textArr = array();

	if (count($baseValues) != 0) {
		processTextMessageRow($textArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
			processTextMessageRow($textArr, $personalValues);
	}

	return $textArr;
}

function processTextMessageRow(&$textArr, $values) {
	foreach ($values as $row) {
		if (count($row) < 1) {
			continue;
		}
		$textArr[] = new TextMessage($row[0]);
	}
}

function writeTextMessageList($fh, $textArr) {
	$textCount = min(count($textArr), 50);
	for ($textRowNum = 0; $textRowNum < $textCount; $textRowNum++) {
		$text = $textArr[$textRowNum];
		writeRDTTextMessage($fh, $textRowNum+1, $text->getText());
	}
}

function readAllDataFromSpreadsheet($gService, $spreadsheetId) {
	$ranges = array(
			DATA_KEY_CHANNEL_COLUMNS,
			DATA_KEY_CHANNELS,
			DATA_KEY_CONTACTS,
			DATA_KEY_GENERAL_SETTINGS,
			DATA_KEY_RX_GROUP_LISTS,
			DATA_KEY_SCAN_LISTS,
			DATA_KEY_TEXT,
			DATA_KEY_ZONES,
			DATA_KEY_MENU_ITEMS
	);
	$params = array(
			'ranges' => $ranges
	);
	$rangeContents = $gService->spreadsheets_values->batchGet($spreadsheetId, $params);
	$results = array();
	$results[DATA_KEY_CHANNEL_COLUMNS] = $rangeContents->valueRanges[0]->values;
	$results[DATA_KEY_CHANNELS] = $rangeContents->valueRanges[1]->values;
	$results[DATA_KEY_CONTACTS] = $rangeContents->valueRanges[2]->values;
	$results[DATA_KEY_GENERAL_SETTINGS] = $rangeContents->valueRanges[3]->values;
	$results[DATA_KEY_RX_GROUP_LISTS] = $rangeContents->valueRanges[4]->values;
	$results[DATA_KEY_SCAN_LISTS] = $rangeContents->valueRanges[5]->values;
	$results[DATA_KEY_TEXT] = $rangeContents->valueRanges[6]->values;
	$results[DATA_KEY_ZONES] = $rangeContents->valueRanges[7]->values;
	$results[DATA_KEY_MENU_ITEMS] = $rangeContents->valueRanges[8]->values;
	return $results;
}

function readMetadataFromSpreadsheet($gService, $spreadsheetId) {
	$ranges = array(
			DATA_KEY_CHANNEL_COLUMNS,
	);
	$params = array(
			'ranges' => $ranges
	);
	$rangeContents = $gService->spreadsheets_values->batchGet($spreadsheetId, $params);
	$results = array();
	$results[DATA_KEY_CHANNEL_COLUMNS] = $rangeContents->valueRanges[0]->values;
	return $results;
}


function generateRdtFile($baseSpreadsheetId, $personalSpreadsheetId) {
	$gClient = getGoogleClient();
	$service = new Google_Service_Sheets($gClient);
	$baseSheetValues = readAllDataFromSpreadsheet($service, $baseSpreadsheetId);
	$personalSheetValues = array();
	if ($personalSpreadsheetId != null) {
		try {
			$personalSheetValues = readAllDataFromSpreadsheet($service, $personalSpreadsheetId);
		} catch (Google_Service_Exception $gse) {
			addError("Unable to read personal spreadsheet file with ID ".$personalSpreadsheetId);
		}
	}
	$genSettings = readGeneralSettings($baseSheetValues[DATA_KEY_GENERAL_SETTINGS],
			array_key_exists(DATA_KEY_GENERAL_SETTINGS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_GENERAL_SETTINGS] : null);
	$menuItems = readMenuItems($baseSheetValues[DATA_KEY_MENU_ITEMS],
			array_key_exists(DATA_KEY_MENU_ITEMS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_MENU_ITEMS] : null);
	$contactArr = readContactList($baseSheetValues[DATA_KEY_CONTACTS],
			array_key_exists(DATA_KEY_CONTACTS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_CONTACTS] : null);
	$groupListArr = readRxGroupLists($baseSheetValues[DATA_KEY_RX_GROUP_LISTS],
			array_key_exists(DATA_KEY_RX_GROUP_LISTS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_RX_GROUP_LISTS] : null);
	$channelArr = readChannelList($baseSheetValues[DATA_KEY_CHANNELS], $baseSheetValues[DATA_KEY_CHANNEL_COLUMNS],
			array_key_exists(DATA_KEY_CHANNELS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_CHANNELS] : null,
			array_key_exists(DATA_KEY_CHANNEL_COLUMNS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_CHANNEL_COLUMNS] : null);
	$scanListArr = readScanLists($baseSheetValues[DATA_KEY_SCAN_LISTS],
			array_key_exists(DATA_KEY_SCAN_LISTS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_SCAN_LISTS] : null);
	$zoneArr = readZoneInfoList($baseSheetValues[DATA_KEY_ZONES],
			array_key_exists(DATA_KEY_ZONES, $personalSheetValues) ? $personalSheetValues[DATA_KEY_ZONES] : null);
	$textMessageArr = readTextMessages($baseSheetValues[DATA_KEY_TEXT],
			array_key_exists(DATA_KEY_TEXT, $personalSheetValues) ? $personalSheetValues[DATA_KEY_TEXT] : null);


	$templateFile = __DIR__ . "/../codeplugs/tytMD380-blank.rdt";
	$genFile = tempnam(sys_get_temp_dir(), 'RDT');
	copy($templateFile, $genFile);
	if ($fh = fopen($genFile, 'rb+')) {
		writeRDTGeneralSettings($fh, $genSettings);
		writeRDTMenuItems($fh, $menuItems);
		writeContacts($fh, $contactArr);
		writeRxGroupLists($fh, $groupListArr, $contactArr);
		writeChannels($fh, $channelArr, $contactArr, $scanListArr, $groupListArr);
		writeScanLists($fh, $scanListArr, $channelArr);
		writeZoneInfoList($fh, $zoneArr, $channelArr);
		writeTextMessageList($fh, $textMessageArr);
	
		fclose($fh);
		return $genFile;
	} else {
		addError("Failed to open temporary file");
		return null;
	}
}

function calculateAckHash() {
	$ackText = '';
	foreach (getWarnings() as $warning) {
		$ackText = $ackText . '-' . md5($warning);
	}

	return md5($ackText);
}

function lookupDocumentId($docName) {
	$sheetsFile = file_get_contents(__DIR__ . "/../config/sheets.json");
	$sheetsData = json_decode($sheetsFile, true);
	if (isset($sheetsData['DMR base']) && isset($sheetsData['DMR base'][$docName])) {
		return $sheetsData['DMR base'][$docName]['id'];
	} else {
		return null;
	}
}

function readRDTContacts($fh) {
	$contactArr = array();
	for ($index = 0; $index < 1000; $index++) {
		fseek($fh, 0x61A5 + (36 * $index));
		$contact = fread($fh, 36);
		$contactVals = unpack("C4chars/v16name", $contact);
		if ($contactVals['chars1'] == 0xFF && $contactVals['chars2'] == 0xFF && $contactVals['chars3'] == 0xFF) {
			continue;
		}
		$name = decodeUnicodeStr($contactVals, 'name', 16);
		$contactId = $contactVals['chars1'] + ($contactVals['chars2'] << 8) + ($contactVals['chars3'] << 16);
		$recvTone = ($contactVals['chars4'] & 0x20) != 0;
		switch($contactVals['chars4'] & 0x03) {
			case 3: $type = 'A'; break;
			case 2: $type = 'P'; break;
			case 1: $type = 'G'; break;
		}
		$contactArr[] = new Contact($name, $contactId, $type, $recvTone, $index + 1);
	}

	return $contactArr;
}

function convertToSpreadsheetValuesFromContacts($contactsArr) {
	$values = array();
	foreach ($contactsArr as $contact) {
		$values[] = array($contact->getContactName(), $contact->getContactNum(),
				$contact->getContactType(), $contact->isCallReceiveTone() ? 'Y' : 'N');
	}
	return $values;
}

function readRDTRxGroupLists($fh, &$contactArr) {
	$objArr = array();
	for ($index = 0; $index < 250; $index++) {
		fseek($fh, 0xEE45 + (96 * $index));
		$rec = fread($fh, 96);
		$binVals = unpack("v16name/v32contacts", $rec);
		if ($binVals['name1'] == 0) {
			continue;
		}
		$name = decodeUnicodeStr($binVals, 'name', 16);
		$contactNames = array();
		for ($i = 1; $i <= 32; $i++) {
			if ($binVals['contacts'.$i] == 0) {
				continue;
			}
			$contactNames[] = findContactNameFromOriginalIndex($contactArr, $binVals['contacts'.$i]);
		}
		$obj = new RxGroupList($name, $contactNames, $index + 1);
		$objArr[] = $obj;
	}

	return $objArr;
}

function convertToSpreadsheetValuesFromRxGroupLists($objArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		$row[] = $obj->getGroupListName();
		foreach ($obj->getContactNames() as $contactName) {
			$row[] = $contactName;
		}
		$values[] = $row;
	}
	return $values;
}

function readRDTTextMessages($fh) {
	$objArr = array();
	for ($index = 0; $index < 50; $index++) {
		fseek($fh, 0x23A5 + (288 * $index));
		$rec = fread($fh, 288);
		$binVals = unpack("v144msg", $rec);
		if ($binVals['msg1'] == 0) {
			continue;
		}
		$msg = decodeUnicodeStr($binVals, 'msg', 144);
		$objArr[] = new TextMessage($msg);
	}

	return $objArr;
}

function convertToSpreadsheetValuesFromTextMessages($objArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		$row[] = $obj->getText();
		$values[] = $row;
	}
	return $values;
}

function readRDTChannel($fh, &$contactsArr, &$rxGrpListArr) {
	$objArr = array();
	for ($index = 0; $index < 1000; $index++) {
		fseek($fh, 0x1F025 + (64 * $index));
		$rec = fread($fh, 64);
		//'CCCC'.'CCv'.'CCCC'.'CCCC'.'V'.'V'.'vv'.'CCCC'.'vvvvvvvvvvvvvvvv'
		$binVals = unpack('C5byte/Ccdummy/vcontactIdx/CtotCode/CtotRekey/Czdummy/CscanListIdx/CgrpListIdx/Codummy/Cbyte6/Cfdummy/VrxFreq/VtxFreq/vtoneDec/vtoneEnc/CtxSig/CrxSig/Cffdummy/Cfffdummy/v16name', $rec);
// 		if (($binVals['rxFreq1'] == 0xFF && $binVals['rxFreq2'] == 0xFF && $binVals['rxFreq3'] == 0xFF && $binVals['rxFreq4'] == 0xFF) || $binVals['name1'] == 0) {
		if ($binVals['rxFreq'] == 0xFFFFFFFF || $binVals['name1'] == 0) {
					continue;
		}
		$name = decodeUnicodeStr($binVals, 'name', 16);
		$rxRefFreq = 'Low';
		if (($binVals['byte4'] & 0b00000001) != 0) {
			$rxRefFreq = 'Medium';
		} else if (($binVals['byte4'] & 0b00000010) != 0) {
			$rxRefFreq = 'High';
		}

		$txRefFreq = 'Low';
		if (($binVals['byte5'] & 0b00000001) != 0) {
			$txRefFreq = 'Medium';
		} else if (($binVals['byte5'] & 0b00000010) != 0) {
			$txRefFreq = 'High';
		}

		if (($binVals['byte5'] & 0b11000000) == 0b11000000) {
			$admit = 'Color Code';
		} else if (($binVals['byte5'] & 0b01000000) != 0) {
			$admit = 'Channel Free';
		} else if (($binVals['byte5'] & 0b10000000) != 0) {
			$admit = 'CTCSS/DCS';
		} else {
			$admit = 'Always';
		}

		$chanMode = (($binVals['byte1'] & 0b00000010) != 0) ? 'Digital' : 'Analog';

		$txSig = ($chanMode == 'Analog' ? 'Off' : '');
		if ($binVals['txSig'] >= 0x01 && $binVals['txSig'] <= 0x04) {
			$txSig = 'DTMF-'.$binVals['txSig'];
		}

		$rxSig = ($chanMode == 'Analog' ? 'Off' : '');
		if ($binVals['rxSig'] >= 0x01 && $binVals['rxSig'] <= 0x04) {
			$rxSig = 'DTMF-'.$binVals['rxSig'];
		}

		$objArr[] = new Channel($name,
				($binVals['byte1'] & 0b10000000) != 0,
				($binVals['byte1'] & 0b00100000) != 0 ? 'Normal' : 'Tight',
				($binVals['byte1'] & 0b00010000) != 0,
				($binVals['byte1'] & 0b00001000) != 0 ? '25.0' : '12.5',
				$chanMode,
				$binVals['byte2'] >> 4,
				($binVals['byte2'] & 0b00001000) != 0 ? 'TS2' : 'TS1',
				($binVals['byte2'] & 0b00000010) != 0,
				($binVals['byte2'] & 0b00000001) != 0,
				($binVals['byte3'] & 0b10000000) != 0,
				($binVals['byte3'] & 0b01000000) != 0,
				($binVals['byte4'] & 0b10000000) == 0,
				($binVals['byte4'] & 0b01000000) == 0,
				$rxRefFreq, $admit,
				($binVals['byte5'] & 0b00100000) == 0 ? 'Low' : 'High',
				($binVals['byte5'] & 0b00010000) != 0,
				($binVals['byte5'] & 0b00001000) != 0 ? '120' : '180',
				($binVals['byte5'] & 0b00000100) != 0,
				$txRefFreq,
				findContactNameFromOriginalIndex($contactsArr, $binVals['contactIdx']),
				($binVals['totCode'] & 0b00111111) * 15,
				$binVals['totRekey'] == 0 ? '0' : $binVals['totRekey'],
				NULL,
				findRxGroupListNameFromOriginalIndex($rxGrpListArr, $binVals['grpListIdx']),
				$binVals['byte6'],
				convertBCDToFrequency($binVals['rxFreq']),
				convertBCDToFrequency($binVals['txFreq']),
				convertToneBCDTToString($binVals['toneDec']),
				convertToneBCDTToString($binVals['toneEnc']),
				$txSig,
				$rxSig,
				$binVals['scanListIdx'],
				$index + 1);
	}

	return $objArr;
}

function getChannelAttributeByColumnName(&$channel, &$colName, &$scanListArr) {
	switch ($colName) {
		case COL_CHANNEL_ADMIT_CRITERIA: return $channel->getAdmitCriteria();
		case COL_CHANNEL_ALLOW_TALKAROUND: return $channel->isAllowTalkaround() ? 'On' : 'Off';
		case COL_CHANNEL_AUTOSCAN: return $channel->isAutoScan() ? 'On' : 'Off';
		case COL_CHANNEL_BANDWIDTH: return $channel->getBandwidth();
		case COL_CHANNEL_CHANNEL_MODE: return $channel->getMode();
		case COL_CHANNEL_COLOR_CODE: return $channel->getColorCode();
		case COL_CHANNEL_COMPRESSED_UDP_HEADER: return $channel->isCompressedUdpHeader() ? 'On' : 'Off';
		case COL_CHANNEL_CONTACT_NAME: return $channel->getContactName();
		case COL_CHANNEL_CTCSS_DCS_DECODE: return $channel->getCtcssDcsDecode();
		case COL_CHANNEL_CTCSS_DCS_ENCODE: return $channel->getCtcssDcsEncode();
		case COL_CHANNEL_DATA_CALL_CONFIRMED: return $channel->isDataCallConf() ? 'On' : 'Off';
		case COL_CHANNEL_DECODE18: return $channel->getDecode18();
		case COL_CHANNEL_DISPLAY_PTT_ID: return $channel->isDisplayPttId() ? 'On' : 'Off';
		case COL_CHANNEL_GROUP_LIST: return $channel->getGroupListName();
		case COL_CHANNEL_LONE_WORKER: return $channel->isLoneWorker() ? 'On' : 'Off';
		case COL_CHANNEL_NAME: return $channel->getChannelName();
		case COL_CHANNEL_POWER: return $channel->getPower();
		case COL_CHANNEL_PRIVATE_CALL_CONFIRMED: return $channel->isPrivateCallConf() ? 'On' : 'Off';
		case COL_CHANNEL_QT_REVERSE: return $channel->getQtReverse();
		case COL_CHANNEL_REPEATER_SLOT: return $channel->getSlot();
		case COL_CHANNEL_REVERSE_BURST: return $channel->isReverseBurst() ? 'On' : 'Off';
		case COL_CHANNEL_RX_FREQ: return $channel->getRxFrequency();
		case COL_CHANNEL_RX_ONLY: return $channel->isRxOnly() ? 'On' : 'Off';
		case COL_CHANNEL_RX_REF_FREQ: return $channel->getRxRefFrequency();
		case COL_CHANNEL_RX_SIGNALING_SYSTEM: return $channel->getRxSignalingSystem();
		case COL_CHANNEL_SCAN_LIST: return findScanListNameFromOriginalIndex($scanListArr, $channel->getImportScanListIndex());
		case COL_CHANNEL_SQUELCH: return $channel->getSquelch();
		case COL_CHANNEL_TOT: return ($channel->getTot() == 0) ? '0' : $channel->getTot();
		case COL_CHANNEL_TOT_REKEY_DELAY: return $channel->getTotRekeyDelay();
		case COL_CHANNEL_TX_FREQ: return $channel->getTxFrequency();
		case COL_CHANNEL_TX_REF_FREQ: return $channel->getTxRefFrequency();
		case COL_CHANNEL_TX_SIGNALING_SYSTEM: return $channel->getTxSignalingSystem();
		case COL_CHANNEL_VOX: return $channel->isVox() ? 'On' : 'Off';
	}
	return NULL;
}

function convertToSpreadsheetValuesFromChannels($objArr, &$channelColumns, &$scanListArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		foreach ($channelColumns as $col) {
			$colVal = getChannelAttributeByColumnName($obj, $col, $scanListArr);
			if ($colVal == NULL) {
				$colVal = '';
			}
			$row[] = $colVal;
		}
		$values[] = $row;
	}
	return $values;
}

function readRDTScanLists($fh, &$channelArr) {
	$objArr = array();
	for ($index = 0; $index < 250; $index++) {
		fseek($fh, 0x18A85  + (104 * $index));
		$rec = fread($fh, 104);
		$binVals = unpack("v16name/vpriChana/vpriChanb/vtxd/Cdummya/CsigHold/Cpsamp/Cdummyb/v31chan", $rec);
		if ($binVals['name1'] == 0) {
			continue;
		}
		$name = decodeUnicodeStr($binVals, 'name', 16);
		if ($binVals['priChana'] == 0) {
			$priChan1 = 'Selected';
		} else if ($binVals['priChana'] == 65535) {
			$priChan1 = 'None';
		} else {
			$priChan1 = findChannelNameFromOriginalIndex($channelArr, $binVals['priChana']);
		}

		if ($binVals['priChanb'] == 0) {
			$priChan2 = 'Selected';
		} else if ($binVals['priChanb'] == 65535) {
			$priChan2 = 'None';
		} else {
			$priChan2 = findChannelNameFromOriginalIndex($channelArr, $binVals['priChanb']);
		}

		$txD = 'None';
		if ($binVals['txd'] == 0) {
			$txD = 'Selected';
		} else if ($binVals['txd'] == 65535) {
			$txD = 'Last';
		} else {
			$txD = findChannelNameFromOriginalIndex($channelArr, $binVals['txd']);
		}

		$chanNames = array();
		for ($ci = 1; $ci <= 31; $ci++) {
			if ($binVals['chan'.$ci] == 0) continue;
			$chanNames[] = findChannelNameFromOriginalIndex($channelArr, $binVals['chan'.$ci]);
		}

		$objArr[] = new ScanList($name,
				$priChan1,
				$priChan2,
				$txD,
				$binVals['sigHold'] * 25,
				$binVals['psamp'] * 250,
				$chanNames,
				$index + 1);
	}

	return $objArr;
}

function convertToSpreadsheetValuesFromScanLists($objArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		$row[] = $obj->getScanListName();
		$row[] = $obj->getPriorityChannel1();
		$row[] = $obj->getPriorityChannel2();
		$row[] = $obj->getTxDesignatedChannel();
		$row[] = $obj->getSignalHoldTime();
		$row[] = $obj->getPrioritySampleTime();
		$row[] = 'Last';
		foreach ($obj->getChannelNames() as $channelName) {
			$row[] = $channelName;
		}
		$values[] = $row;
	}
	return $values;
}

function readRDTZones($fh, &$channelArr) {
	$objArr = array();
	for ($index = 0; $index < 250; $index++) {
		fseek($fh, 0x14C05  + (64 * $index));
		$rec = fread($fh, 64);
		$binVals = unpack("v16name/v16chan", $rec);
		if ($binVals['name1'] == 0) {
			continue;
		}
		$name = decodeUnicodeStr($binVals, 'name', 16);

		$chanNames = array();
		for ($ci = 1; $ci <= 16; $ci++) {
			if ($binVals['chan'.$ci] == 0) continue;
			$chanNames[] = findChannelNameFromOriginalIndex($channelArr, $binVals['chan'.$ci]);
		}

		$objArr[] = new ZoneInfo($name, $chanNames);
	}

	return $objArr;
}

function convertToSpreadsheetValuesFromZones($objArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		$row[] = $obj->getZoneName();
		foreach ($obj->getChannelNames() as $channelName) {
			$row[] = $channelName;
		}
		$values[] = $row;
	}
	return $values;
}

function importRDTFile($fileName, $spreadsheetId) {
	if ($fh = fopen($fileName, 'rb+')) {
		$contactsArr = readRDTContacts($fh);
		$rxGroupsArr = readRDTRxGroupLists($fh, $contactsArr);
		$textMsgArr = readRDTTextMessages($fh);
		$channelArr = readRDTChannel($fh, $contactsArr, $rxGroupsArr);
		$scanListArr = readRDTScanLists($fh, $channelArr);
		$zoneArr = readRDTZones($fh, $channelArr);

		$gClient = getGoogleClient(false);
		$service = new Google_Service_Sheets($gClient);
		$metadata = readMetadataFromSpreadsheet($service, $spreadsheetId);

		$contactsData = convertToSpreadsheetValuesFromContacts($contactsArr);
		$rxGroupsData = convertToSpreadsheetValuesFromRxGroupLists($rxGroupsArr);
		$textMsgData = convertToSpreadsheetValuesFromTextMessages($textMsgArr);
		$channelData = convertToSpreadsheetValuesFromChannels($channelArr, $metadata[DATA_KEY_CHANNEL_COLUMNS][0], $scanListArr);
		$scanListData = convertToSpreadsheetValuesFromScanLists($scanListArr);
		$zoneData = convertToSpreadsheetValuesFromZones($zoneArr);

		$data = array();
		$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_CONTACTS, 'values' => $contactsData));
		$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_RX_GROUP_LISTS, 'values' => $rxGroupsData));
		$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_TEXT, 'values' => $textMsgData));
		$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_CHANNELS, 'values' => $channelData));
		$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_SCAN_LISTS, 'values' => $scanListData));
		$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_ZONES, 'values' => $zoneData));
		
		$body = new Google_Service_Sheets_BatchUpdateValuesRequest(array(
				'valueInputOption' => 'USER_ENTERED',
				'data' => $data
		));
		$result = $service->spreadsheets_values->batchUpdate($spreadsheetId, $body);
	} else {
		echo "Failed to open file\n";
	}
}
?>