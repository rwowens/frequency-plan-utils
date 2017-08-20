<?php
function generateRdbFile($baseSpreadsheetId, $personalSpreadsheetId) {
	$spreadsheetData = retrieveSpreadsheetData($baseSpreadsheetId, $personalSpreadsheetId);
	
	if ($spreadsheetData == null) {
		addError("No data found");
		return null;
	}
	$templateFile = __DIR__ . "/../codeplugs/cs800_default.rdb";
	$genFile = tempnam(sys_get_temp_dir(), 'RDB');
	copy($templateFile, $genFile);
	if ($fh = fopen($genFile, 'rb+')) {
		
// 		writeRDTGeneralSettings($fh, $spreadsheetData->getGeneralSettings());
// 		writeRDTMenuItems($fh, $spreadsheetData->getMenuItemsMap());
// 		writeRDTButtonDefinitions($fh, $spreadsheetData->getButtonDefinitions(), $spreadsheetData->getTextMessageArray(), $spreadsheetData->getContactArray());
// 		writeContacts($fh, $spreadsheetData->getContactArray());
// 		writeRxGroupLists($fh, $spreadsheetData->getRxGroupListArray(), $spreadsheetData->getContactArray());
// 		writeChannels($fh, $spreadsheetData->getChannelArray(), $spreadsheetData->getContactArray(), $spreadsheetData->getScanListArray(), $spreadsheetData->getRxGroupListArray());
// 		writeScanLists($fh, $spreadsheetData->getScanListArray(), $spreadsheetData->getChannelArray());
// 		writeZoneInfoList($fh, $spreadsheetData->getZoneInfoArray(), $spreadsheetData->getChannelArray());
// 		writeTextMessageList($fh, $spreadsheetData->getTextMessageArray());
		
		fclose($fh);
		return $genFile;
	} else {
		addError("Failed to open temporary file");
		return null;
	}
}

function convertStringToCSCode($str, $length) {
	$strArr = str_split($str);
	$bitCount = 0;
	$outArr = array();
	foreach ($strArr as $value) {
		if ($value >= 'a' && $value <= 'z') {
			$char = 0x100100 + (ord($value) + 1 - ord('a'));
		} else if ($value >= 'A' && $value <= 'Z') {
			$char = 0x001010 + (ord($value) + 1 - ord('A'));
		}
	}
	while (count($strArr) < $length) {
		$strArr[count($strArr)] = 0;
	}
	return $strArr;
}

function writeRDBContacts($fh, $spreadsheetData->getContactArray()) {
	$contactCount = min(count($contactArr), 1000);
	for ($contactRowNum = 0; $contactRowNum < $contactCount; $contactRowNum++) {
		$contact = $contactArr[$contactRowNum];
		writeRDBDigitalContact($fh, $contactRowNum+1, $contact->getContactNum(), $contact->getContactType(), $contact->getContactName(), $contact->isCallReceiveTone());
	}
}

function writeRDBDigitalContact(&$fh, $contactNum, $callId, $callType, $name, $recvTone = false) {
	// BCD = little endian = v
	// RevBCD = big endian = n
	$contactOffset = (16 * ($contactNum-1));
	fseek($fh, 0x44000 + $contactOffset);
	$callId1 = $callId & 0xFF;
	$callId2 = ($callId >> 8) & 0xFF;
	$callId3 = ($callId >> 16) & 0xFF;


	fseek($fh, 0x44000 + $contactOffset);
	
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
?>