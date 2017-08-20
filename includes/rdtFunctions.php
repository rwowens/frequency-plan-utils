<?php
require_once __DIR__ . '/utils.php';
require_once __DIR__ . '/clientHelper.php';
require_once __DIR__ . '/spreadsheetFunctions.php';

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

function getButtonCodesArray() {
	return array(
			0x00 => 'Unassigned (default)',
			0x01 => 'All Alert Tones On/Off',
			0x02 => 'Emergency On',
			0x03 => 'Emergency Off',
			0x04 => 'High/Low Power',
			0x05 => 'Monitor',
			0x06 => 'Nuisance Delete',
			0x07 => 'One Touch Access 1',
			0x08 => 'One Touch Access 2',
			0x09 => 'One Touch Access 3',
			0x0A => 'One Touch Access 4',
			0x0B => 'One Touch Access 5',
			0x0C => 'One Touch Access 6',
			0x0D => 'Repeater/Talkaround',
			0x0E => 'Scan On/Off',
			0x15 => 'Tight/Normal Squelch',
			0x16 => 'Privacy On/Off',
			0x17 => 'VOX On/Off',
			0x18 => 'Zone Select',
			0x1E => 'Manual Dial For Private',
			0x1F => 'Lone Work On/Off',
	);
}

function convertCodeNumToButtonFunction($codeNum) {
	$arr = getButtonCodesArray();
	$name = $arr[$codeNum];
	if ($name == null) {
		$name = $arr[0x00];
	}
	return $name;
}

function convertButtonFunctionToCodeNum($btnFunction) {
	if ($btnFunction == null) {
		return 0x00;
	}

	$arr = getButtonCodesArray();
	$codeNum = array_search($btnFunction, $arr);
	if ($codeNum === FALSE) {
		$codeNum = 0x00;
	}
	return $codeNum;
}

function convertCodeNumToOneTouchFunction($codeNum) {
	switch ($codeNum) {
		case 0xC1: return 'None';
		case 0xD1: return 'Digital Text';
		case 0xD0: return 'Digital Call';
		case 0xE8: return 'Analog DTMF-1';
		case 0xE9: return 'Analog DTMF-2';
		case 0xEA: return 'Analog DTMF-3';
		case 0xEB: return 'Analog DTMF-4';
		default: return '';
	}
}

function convertOneTouchFunctionToCodeNum($otf) {
	if ($otf == null) {
		return 0xC1;
	}

	if (strpos($otf, "Analog DTMF-") !== FALSE) {
		addWarning("Analog one touch button functionality not supported");
	}

	// If we want to support the Analog DTMF-* functionality, we must also support
	// the DTMF signalling. This seems like unnecessary effort for amateur use,
	// so disabling the analog stuff for now.
	switch ($otf) {
		case "Digital Text": return 0xD1;
		case "Digital Call": return 0xD0;
// 		case "Analog DTMF-1": return 0xE8;
// 		case "Analog DTMF-2": return 0xE9;
// 		case "Analog DTMF-3": return 0xEA;
// 		case "Analog DTMF-4": return 0xEB;
		default: return 0xC1;
	}
}

function writeRDTButtonDefinitionsOneTouch(&$fh, &$textMsgArr, &$contactArr, $otIndex, $otFuncStr, $otMsgStr, $otCallStr) {
	$otFuncCode = convertOneTouchFunctionToCodeNum($otFuncStr);
	$otText = findTextMessageIndex($textMsgArr, $otMsgStr);
	$otContact = findContactNameIndex($contactArr, $otCallStr);

	if ($otFuncCode == 0xD1 && ($otText == null || $otContact == null)) {
		addError("For one touch button digital text mode, both a contact and a message must be specified");
	}

	if ($otFuncCode == 0xD0 && $otContact == null) {
		addError("For one touch button (".$otIndex.") digital call mode, a contact must be specified");
	}

	fseek($fh, 0x2339 + (4*($otIndex - 1)));
	$data = pack("CCC", $otFuncCode, $otText, $otContact);
	fwrite($fh, $data);
}

function writeRDTButtonDefinitions(&$fh, &$buttons, &$textMsgArr, &$contactArr) {
	$longPressVal = 0x04;
	if ($buttons->getLongPressDuration() != null) {
		if ($buttons->getLongPressDuration() >= 1000 && $buttons->getLongPressDuration() <= 3750 && $buttons->getLongPressDuration() % 250 == 0) {
			$longPressVal = round($buttons->getLongPressDuration() / 250);
		} else {
			addError("Invalid button long press duration. Must be between 1000 and 3750 inclusive and a multiple of 250.");
		}
	}
	$side1Short = convertButtonFunctionToCodeNum($buttons->getSideButton1ShortPress());
	$side1Long = convertButtonFunctionToCodeNum($buttons->getSideButton1LongPress());
	$side2Short = convertButtonFunctionToCodeNum($buttons->getSideButton2ShortPress());
	$side2Long = convertButtonFunctionToCodeNum($buttons->getSideButton2LongPress());

	fseek($fh, 0x2326);
	$data = pack("CCCCC", $longPressVal, $side1Short, $side1Long, $side2Short, $side2Long);
	fwrite($fh, $data);

	writeRDTButtonDefinitionsOneTouch($fh, $textMsgArr, $contactArr, 1,
			$buttons->getOneTouch1(),
			$buttons->getOneTouch1Message(),
			$buttons->getOneTouch1Call());

	writeRDTButtonDefinitionsOneTouch($fh, $textMsgArr, $contactArr, 2,
			$buttons->getOneTouch2(),
			$buttons->getOneTouch2Message(),
			$buttons->getOneTouch2Call());

	writeRDTButtonDefinitionsOneTouch($fh, $textMsgArr, $contactArr, 3,
			$buttons->getOneTouch3(),
			$buttons->getOneTouch3Message(),
			$buttons->getOneTouch3Call());

	writeRDTButtonDefinitionsOneTouch($fh, $textMsgArr, $contactArr, 4,
			$buttons->getOneTouch4(),
			$buttons->getOneTouch4Message(),
			$buttons->getOneTouch4Call());

	writeRDTButtonDefinitionsOneTouch($fh, $textMsgArr, $contactArr, 5,
			$buttons->getOneTouch5(),
			$buttons->getOneTouch5Message(),
			$buttons->getOneTouch5Call());

	writeRDTButtonDefinitionsOneTouch($fh, $textMsgArr, $contactArr, 6,
			$buttons->getOneTouch6(),
			$buttons->getOneTouch6Message(),
			$buttons->getOneTouch6Call());

	fseek($fh, 0x2351);
	$data = pack("vvvvvvvvvv",
			findContactNameIndex($contactArr, $buttons->getQuickKey0()),
			findContactNameIndex($contactArr, $buttons->getQuickKey1()),
			findContactNameIndex($contactArr, $buttons->getQuickKey2()),
			findContactNameIndex($contactArr, $buttons->getQuickKey3()),
			findContactNameIndex($contactArr, $buttons->getQuickKey4()),
			findContactNameIndex($contactArr, $buttons->getQuickKey5()),
			findContactNameIndex($contactArr, $buttons->getQuickKey6()),
			findContactNameIndex($contactArr, $buttons->getQuickKey7()),
			findContactNameIndex($contactArr, $buttons->getQuickKey8()),
			findContactNameIndex($contactArr, $buttons->getQuickKey9())
		);

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

function decodeRevBCD($value, $digitCount) {
	$str = '';
	for ($i = 0; $i < $digitCount; $i++) {
		$str = ($value & 0x0F) . $str;
		$value = $value >> 4;
	}
	return $str;
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



function writeContacts($fh, $contactArr) {
	$contactCount = min(count($contactArr), 1000);
	for ($contactRowNum = 0; $contactRowNum < $contactCount; $contactRowNum++) {
		$contact = $contactArr[$contactRowNum];
		writeRDTDigitalContact($fh, $contactRowNum+1, $contact->getContactNum(), $contact->getContactType(), $contact->getContactName(), $contact->isCallReceiveTone());
	}
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

function writeChannels($fh, $channelArr, $contactArr, $scanListArr, $groupListArr) {
	$channelCount = min(count($channelArr), 1000);
	for ($channelRowNum = 0; $channelRowNum < $channelCount; $channelRowNum++) {
		$channel = $channelArr[$channelRowNum];
		writeRDTChannel($fh, $channelRowNum+1, $channel, $contactArr, $scanListArr, $groupListArr);
	}
}

function writeZoneInfoList($fh, $zoneArr, &$channelArr) {
	$zoneCount = min(count($zoneArr), 250);
	for ($zoneRowNum = 0; $zoneRowNum < $zoneCount; $zoneRowNum++) {
		$zone = $zoneArr[$zoneRowNum];
		writeRDTZoneInfo($fh, $zoneRowNum+1, $zone->getZoneName(), $zone->getChannelNames(), $channelArr);
	}
}

function writeTextMessageList($fh, $textArr) {
	$textCount = min(count($textArr), 50);
	for ($textRowNum = 0; $textRowNum < $textCount; $textRowNum++) {
		$text = $textArr[$textRowNum];
		writeRDTTextMessage($fh, $textRowNum+1, $text->getText());
	}
}

function generateRdtFile($baseSpreadsheetId, $personalSpreadsheetId) {
	$spreadsheetData = retrieveSpreadsheetData($baseSpreadsheetId, $personalSpreadsheetId);

	if ($spreadsheetData == null) {
		addError("No data found");
		return null;
	}
	$templateFile = __DIR__ . "/../codeplugs/tytMD380-blank.rdt";
	$genFile = tempnam(sys_get_temp_dir(), 'RDT');
	copy($templateFile, $genFile);
	if ($fh = fopen($genFile, 'rb+')) {
		writeRDTGeneralSettings($fh, $spreadsheetData->getGeneralSettings());
		writeRDTMenuItems($fh, $spreadsheetData->getMenuItemsMap());
		writeRDTButtonDefinitions($fh, $spreadsheetData->getButtonDefinitions(), $spreadsheetData->getTextMessageArray(), $spreadsheetData->getContactArray());
		writeContacts($fh, $spreadsheetData->getContactArray());
		writeRxGroupLists($fh, $spreadsheetData->getRxGroupListArray(), $spreadsheetData->getContactArray());
		writeChannels($fh, $spreadsheetData->getChannelArray(), $spreadsheetData->getContactArray(), $spreadsheetData->getScanListArray(), $spreadsheetData->getRxGroupListArray());
		writeScanLists($fh, $spreadsheetData->getScanListArray(), $spreadsheetData->getChannelArray());
		writeZoneInfoList($fh, $spreadsheetData->getZoneInfoArray(), $spreadsheetData->getChannelArray());
		writeTextMessageList($fh, $spreadsheetData->getTextMessageArray());
	
		fclose($fh);
		return $genFile;
	} else {
		addError("Failed to open temporary file");
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

function readRDTTextMessages($fh) {
	$objArr = array();
	for ($index = 0; $index < 50; $index++) {
		fseek($fh, 0x23A5 + (288 * $index));
		$rec = fread($fh, 288);
		$binVals = unpack("v144msg", $rec);
		if ($binVals['msg1'] == 0 || $binVals['msg1'] == 0xFFFF) {
			continue;
		}
		$msg = decodeUnicodeStr($binVals, 'msg', 144);
		$objArr[] = new TextMessage($msg);
	}

	return $objArr;
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

function readRDTGeneralSettings(&$fh) {
	fseek($fh, 0x2265);

	$rec = fread($fh, 40);
	$binVals = unpack("v10infoone/v10infotwo", $rec);
	$infoLine1 = '';
	if ($binVals['infoone1'] != 0) {
		$infoLine1 = decodeUnicodeStr($binVals, 'infoone', 10);
	}
	$infoLine2 = '';
	if ($binVals['infotwo1'] != 0) {
		$infoLine2 = decodeUnicodeStr($binVals, 'infotwo', 10);
	}

	fseek($fh, 0x2265 + 64);
	$rec = fread($fh, 3);
	$binVals = unpack("Cbyte1/Cbyte2/Cbyte3", $rec);
	$monitorType = ($binVals['byte1'] && 0b00010000) != 0 ? 'Open Squelch' : 'Silent';
	$isDisableAllLeds = (($binVals['byte1'] && 0b00000100) == 0) ? 'On' : 'Off';
	$talkPermitTone = 'None';
	if ($binVals['byte2'] & 0b11000000 == 0b11000000) {
		$talkPermitTone = 'Analog & Digital';
	} else if ($binVals['byte2'] & 0b11000000 == 0b10000000) {
		$talkPermitTone = 'Analog';
	} else if ($binVals['byte2'] & 0b11000000 == 0b01000000) {
		$talkPermitTone = 'Digital';
	}
	$isPasswordAndLockEnabled = (($binVals['byte2'] & 0b00100000) == 0) ? 'On' : 'Off';
	$isChFreeIndicationTone = (($binVals['byte2'] & 0b00010000) == 0) ? 'On' : 'Off';
	$isDisableAllTone = (($binVals['byte2'] & 0b00000100) == 0) ? 'On' : 'Off';
	$isSaveModeReceive = (($binVals['byte2'] & 0b00000010) != 0) ? 'On' : 'Off';
	$isSavePreamble = (($binVals['byte2'] & 0b00000001) != 0) ? 'On' : 'Off';
	$introScreen = ($binVals['byte3'] & 0b00010000) != 0 ? 'Picture' : 'Char string';

	fseek($fh, 0x2265 + 68);
	$rec = fread($fh, 4);
	$binVals = unpack("Vradioid", $rec);
	$radioId = $binVals['radioid'];

	fseek($fh, 0x2265 + 72);
	$rec = fread($fh, 4);
	$binVals = unpack("Ctxpre/Cgroupcall/Cprivcall/Cvox", $rec);
	$txPreamble = 60 * $binVals['txpre'];
	$groupCallHangTime = 100 * $binVals['groupcall'];
	$privateCallHangTime = 100 * $binVals['privcall'];
	$voxSens = $binVals['vox'];

	fseek($fh, 0x2265 + 78);
	$rec = fread($fh, 4);
	$binVals = unpack("Crxlow/Ccallalert/Cloneworkresp/Cloneworkrem", $rec);
	$rxLowBatt = 5 * $binVals['rxlow'];
	$callAlertTone = 5 * $binVals['callalert'];
	if ($callAlertTone == 0) {
		$callAlertTone = 'Continue';
	}
	$loneWorkerRespTime = $binVals['loneworkresp'];
	$loneWorkerRemTime = $binVals['loneworkrem'];

	fseek($fh, 0x2265 + 83);
	$rec = fread($fh, 2);
	$binVals = unpack("Cdig/Cana", $rec);
	$scanDigHangTime = 100 * $binVals['dig'];
	$scanAnalogHangTime = 100 * $binVals['ana'];

	fseek($fh, 0x2265 + 85);
	$rec = fread($fh, 1);
	$binVals = unpack("Cbacklight", $rec);
	$backlightTime = 5 * $binVals['backlight'];
	if ($backlightTime == 0) {
		$backlightTime = 'Always';
	}

	fseek($fh, 0x2265 + 86);
	$rec = fread($fh, 10);
	$binVals = unpack("Clock/Cmode/Npop/Nprog", $rec);
	$keypadLockTime = 'Manual';
	if ($binVals['lock'] != 255) {
		$keypadLockTime = $binVals['lock'] * 5;
	}
	$mode = ($binVals['mode'] == 0) ? 'mr' : 'ch';

	$powerOnPassword = decodeRevBCD($binVals['pop'], 8);
	$radioProgramPassword = decodeRevBCD($binVals['prog'], 8);

	fseek($fh, 0x2265 + 96);
	$rec = fread($fh, 8);
	$binVals = unpack("Ca/Cb/Cc/Cd/Ce/Cf/Cg/Ch", $rec);
	$pcProgramPassword = '';
	if ($binVals['a'] != 255) {
		$pcProgramPassword = $binVals['a'].$binVals['b'].$binVals['c'].$binVals['d'].
								$binVals['e'].$binVals['f'].$binVals['g'].$binVals['h'];
	}

	fseek($fh, 0x2265 + 112);
	$rec = fread($fh, 32);
	$binVals = unpack("v16name", $rec);
	$radioName = '';
	if ($binVals['name1'] != 0) {
		$radioName = decodeUnicodeStr($binVals, 'name', 16);
	}

	return new GeneralSettings($infoLine1, $infoLine2, $monitorType, $isDisableAllLeds, $talkPermitTone, $isPasswordAndLockEnabled,
			$isChFreeIndicationTone, $isDisableAllTone, $isSaveModeReceive, $isSavePreamble, $introScreen, $radioId, $txPreamble,
			$groupCallHangTime, $privateCallHangTime, $voxSens, $rxLowBatt, $callAlertTone, $loneWorkerRespTime,
			$loneWorkerRemTime, $scanDigHangTime, $scanAnalogHangTime, $keypadLockTime, $backlightTime, $mode, $powerOnPassword,
			$radioProgramPassword, $pcProgramPassword, $radioName);
}

function readRDTMenuItems(&$fh) {
	fseek($fh, 0x2315);
	$rec = fread($fh, 5);
	$binVals = unpack("C5byte", $rec);

	$menuHangTime = $binVals['byte1'];
	$byte1 = $binVals['byte2'];
	$byte2 = $binVals['byte3'];
	$byte3 = $binVals['byte4'];
	$byte4 = $binVals['byte5'];
	$isRadioDisable =	convertBooleanToChecked(($byte1 & 0b10000000) != 0);
	$isRadioEnable =	convertBooleanToChecked(($byte1 & 0b01000000) != 0);
	$isRemoteMonitor =	convertBooleanToChecked(($byte1 & 0b00100000) != 0);
	$isRadioCheck =		convertBooleanToChecked(($byte1 & 0b00010000) != 0);
	$isManualDial =		convertBooleanToChecked(($byte1 & 0b00001000) != 0);
	$isEdit =			convertBooleanToChecked(($byte1 & 0b00000100) != 0);
	$isCallAlert =		convertBooleanToChecked(($byte1 & 0b00000010) != 0);
	$isTextMessage =	convertBooleanToChecked(($byte1 & 0b00000001) != 0);

	$isToneOrAlert =	convertBooleanToChecked(($byte2 & 0b10000000) != 0);
	$isTalkaround =		convertBooleanToChecked(($byte2 & 0b01000000) != 0);
	$isOutgoingRadio =	convertBooleanToChecked(($byte2 & 0b00100000) != 0);
	$isAnswered =		convertBooleanToChecked(($byte2 & 0b00010000) != 0);
	$isMissed =			convertBooleanToChecked(($byte2 & 0b00001000) != 0);
	$isEditList =		convertBooleanToChecked(($byte2 & 0b00000100) != 0);
	$isScan =			convertBooleanToChecked(($byte2 & 0b00000010) != 0);
	$isProgramKey =		convertBooleanToChecked(($byte2 & 0b00000001) != 0);

	$isVox =			convertBooleanToChecked(($byte3 & 0b10000000) != 0);
	$isSquelch =		convertBooleanToChecked(($byte3 & 0b00100000) != 0);
	$isKeyboardLock =	convertBooleanToChecked(($byte3 & 0b00001000) != 0);
	$isBacklight =		convertBooleanToChecked(($byte3 & 0b00000010) != 0);
	$isLedIndicator =	convertBooleanToChecked(($byte3 & 0b00010000) != 0);
	$isIntroScreen =	convertBooleanToChecked(($byte3 & 0b00000100) != 0);
	$isPower =			convertBooleanToChecked(($byte3 & 0b00000001) != 0);

	$isProgramRadio =	convertBooleanToChecked(($byte4 & 0b00000100) != 0);
	$isDisplayMode =	convertBooleanToChecked(($byte4 & 0b00000010) != 0);
	$isPasswordAndLock =convertBooleanToChecked(($byte4 & 0b00000001) != 0);
	 
	return new MenuItem($isTextMessage,
						$isCallAlert,
						$isManualDial,
						$isRemoteMonitor,
						$isRadioEnable,
						$isEdit,
						$isRadioCheck,
						$isProgramKey,
						$isRadioDisable,
						$isMissed,
						$isOutgoingRadio,
						$isAnswered,
						$isTalkaround,
						$isPower,
						$isIntroScreen,
						$isLedIndicator,
						$isPasswordAndLock,
						$isDisplayMode,
						$isToneOrAlert,
						$isBacklight,
						$isKeyboardLock,
						$isSquelch,
						$isVox,
						$isProgramRadio,
						$isScan,
						$isEditList,
						$menuHangTime);
}

function readRDTButtonDefinitions(&$fh, &$textMsgArr, &$contactArr) {
	fseek($fh, 0x2326);
	$rec = fread($fh, 5);
	$binVals = unpack('C5byte', $rec);

	$longPressDuration = $binVals['byte1'] * 250;
	if ($longPressDuration == 0) {
		$longPressDuration = 1000;
	}
	$sideButton1ShortPress = convertCodeNumToButtonFunction($binVals['byte2']);
	$sideButton1LongPress = convertCodeNumToButtonFunction($binVals['byte3']);
	$sideButton2ShortPress = convertCodeNumToButtonFunction($binVals['byte4']);
	$sideButton2LongPress = convertCodeNumToButtonFunction($binVals['byte5']);

	$otFuncArr = array();
	$otTextArr = array();
	$otContactArr = array();
	for ($otIndex = 1; $otIndex <= 6; $otIndex++) {
		fseek($fh, 0x2339 + (4*($otIndex - 1)));
		$rec = fread($fh, 3);
		$binVals = unpack('C3byte', $rec);

		$otFuncArr[$otIndex] = convertCodeNumToOneTouchFunction($binVals['byte1']);
		$otTextArr[$otIndex] =  $textMsgArr[$binVals['byte2'] - 1]->getText();
		$otContactArr[$otIndex] = $contactArr[$binVals['byte3'] - 1]->getContactName();
	}

	fseek($fh, 0x2351);
	$rec = fread($fh, 20);
	$binVals = unpack("v10keys", $rec);

	return new ButtonsDefinitions($longPressDuration,
			$sideButton1ShortPress, $sideButton1LongPress, $sideButton2ShortPress, $sideButton2LongPress,
			$otFuncArr[1], $otContactArr[1], $otTextArr[1],
			$otFuncArr[2], $otContactArr[2], $otTextArr[2],
			$otFuncArr[3], $otContactArr[3], $otTextArr[3],
			$otFuncArr[4], $otContactArr[4], $otTextArr[4],
			$otFuncArr[5], $otContactArr[5], $otTextArr[5],
			$otFuncArr[6], $otContactArr[6], $otTextArr[6],
			$contactArr[$binVals['keys1']]->getContactName(),
			$contactArr[$binVals['keys2']]->getContactName(),
			$contactArr[$binVals['keys3']]->getContactName(),
			$contactArr[$binVals['keys4']]->getContactName(),
			$contactArr[$binVals['keys5']]->getContactName(),
			$contactArr[$binVals['keys6']]->getContactName(),
			$contactArr[$binVals['keys7']]->getContactName(),
			$contactArr[$binVals['keys8']]->getContactName(),
			$contactArr[$binVals['keys9']]->getContactName(),
			$contactArr[$binVals['keys10']]->getContactName());
}

function importRDTFile($fileName, $spreadsheetId, $importRegionsArr) {
	if ($fh = fopen($fileName, 'rb+')) {
		try {
			$generalSettings = readRDTGeneralSettings($fh);
			$contactsArr = readRDTContacts($fh);
			$rxGroupsArr = readRDTRxGroupLists($fh, $contactsArr);
			$textMsgArr = readRDTTextMessages($fh);
			$channelArr = readRDTChannel($fh, $contactsArr, $rxGroupsArr);
			$scanListArr = readRDTScanLists($fh, $channelArr);
			$zoneArr = readRDTZones($fh, $channelArr);
			$menuItems = readRDTMenuItems($fh);
			$buttons = readRDTButtonDefinitions($fh, $textMsgArr, $contactsArr);

			$gClient = getGoogleClient(false);
			$service = new Google_Service_Sheets($gClient);
			$metadata = readMetadataFromSpreadsheet($service, $spreadsheetId);

			$contactsData = convertToSpreadsheetValuesFromContacts($contactsArr);
			$rxGroupsData = convertToSpreadsheetValuesFromRxGroupLists($rxGroupsArr);
			$textMsgData = convertToSpreadsheetValuesFromTextMessages($textMsgArr);
			$channelData = convertToSpreadsheetValuesFromChannels($channelArr, $metadata[DATA_KEY_CHANNEL_COLUMNS][0], $scanListArr);
			$scanListData = convertToSpreadsheetValuesFromScanLists($scanListArr);
			$zoneData = convertToSpreadsheetValuesFromZones($zoneArr);
			$generalSettingsData = convertToSpreadsheetValuesFromGeneralSettings($generalSettings, $metadata[DATA_KEY_GENERAL_SETTINGS]);
			$menuItemsData = convertToSpreadsheetValuesFromMenuItems($menuItems, $metadata[DATA_KEY_MENU_ITEMS]);
			$buttonsData = convertToSpreadsheetValuesFromButtonsDefinitions($buttons, $metadata[DATA_KEY_BUTTON_DEFINITIONS]);

			$data = array();
			if (in_array(DATA_KEY_CONTACTS, $importRegionsArr)) {
				$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_CONTACTS, 'values' => $contactsData));
			}
			if (in_array(DATA_KEY_RX_GROUP_LISTS, $importRegionsArr)) {
				$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_RX_GROUP_LISTS, 'values' => $rxGroupsData));
			}
			if (in_array(DATA_KEY_TEXT, $importRegionsArr)) {
				$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_TEXT, 'values' => $textMsgData));
			}
			if (in_array(DATA_KEY_CHANNELS, $importRegionsArr)) {
				$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_CHANNELS, 'values' => $channelData));
			}
			if (in_array(DATA_KEY_SCAN_LISTS, $importRegionsArr)) {
				$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_SCAN_LISTS, 'values' => $scanListData));
			}
			if (in_array(DATA_KEY_ZONES, $importRegionsArr)) {
				$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_ZONES, 'values' => $zoneData));
			}
			if (in_array(DATA_KEY_GENERAL_SETTINGS, $importRegionsArr)) {
				$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_GENERAL_SETTINGS, 'values' => $generalSettingsData));
			}
			if (in_array(DATA_KEY_MENU_ITEMS, $importRegionsArr)) {
				$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_MENU_ITEMS, 'values' => $menuItemsData));
			}
			if (in_array(DATA_KEY_BUTTON_DEFINITIONS, $importRegionsArr)) {
				$data[] = new Google_Service_Sheets_ValueRange(array('range' => DATA_KEY_BUTTON_DEFINITIONS, 'values' => $buttonsData));
			}

			try {
				$body = new Google_Service_Sheets_BatchUpdateValuesRequest(array(
						'valueInputOption' => 'USER_ENTERED',
						'data' => $data
				));
				$result = $service->spreadsheets_values->batchUpdate($spreadsheetId, $body);
			} catch (Google_Service_Exception $e) {
				addError('Failed to update spreadsheet. Is it publicly writable?');
			}
		} finally {
			fclose($fh);
		}
	} else {
		addError("Failed to open file");
	}
}
?>