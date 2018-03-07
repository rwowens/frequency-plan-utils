<?php
namespace RadioModels;

class CS800FileUtils implements \RadioFileUtils {
	public function generateRadioFile($baseSpreadsheetId, $personalSpreadsheetId) {
		$spreadsheetData = retrieveSpreadsheetData($baseSpreadsheetId, $personalSpreadsheetId);

		if ($spreadsheetData == null) {
			addError("No data found");
			return null;
		}

		$templateFile = __DIR__ . "/../../../codeplugs/cs800_default.rdb";
		$genFile = tempnam(sys_get_temp_dir(), 'RDB');
		copy($templateFile, $genFile);
		if ($fh = fopen($genFile, 'rb+')) {
			$contactArr = $spreadsheetData->getContactArray();
			$rxGrpListArr = $spreadsheetData->getRxGroupListArray();
			$chanArr = $spreadsheetData->getChannelArray();
			$scanListArr = $spreadsheetData->getScanListArray();
			$genSettings = $spreadsheetData->getGeneralSettings();
			$zoneInfoArr = $spreadsheetData->getZoneInfoArray();

			$this->writeGeneralSettings($fh, $genSettings);
	// 		writeRDTMenuItems($fh, $spreadsheetData->getMenuItemsMap());
	// 		writeRDTButtonDefinitions($fh, $spreadsheetData->getButtonDefinitions(), $spreadsheetData->getTextMessageArray(), $spreadsheetData->getContactArray());
			$this->writeContacts($fh, $contactArr);
			$this->writeRxGroupLists($fh, $rxGrpListArr, $contactArr);
			$this->writeChannels($fh, $chanArr, $contactArr, $scanListArr, $rxGrpListArr);
			$this->writeScanLists($fh, $scanListArr, $chanArr);
			$this->writeZones($fh, $zoneInfoArr, $chanArr);
	// 		writeTextMessageList($fh, $spreadsheetData->getTextMessageArray());
			
			fclose($fh);
			return $genFile;
		} else {
			addError("Failed to open temporary file");
			return null;
		}
	}

	private function processCSCodeBytes(&$bitCount, &$accumulator, &$outArr) {
		if ($bitCount >= 8) {
			// Get the 8 high order bits
			$tempBits = (int)($accumulator >> ($bitCount - 8));
			// Determine a mask to strip of 8 high order bits
			$aMask = (1 << ($bitCount - 8)) - 1;
			// Apply the mask to accumulator
			$accumulator = ($accumulator & $aMask);
			// Put 8 high order bits into outArr
			$outArr[] = $tempBits;
			// Reduce bitCount by one byte worth of bits
			$bitCount -= 8;
		}
	}

	/**
	 * Given a string, converts it into an array of CS code bytes.
	 * @param $str String to convert.
	 * @param $strLength This value times 6 must be evenly divisible by 8.
	 * @return char[]
	 */
	protected function convertStringToCSCode($str, $strLength) {
		$strArr = str_split($str);
		$targetByteLen = intval(ceil(($strLength * 6.0) / 8.0));
		$bitCount = 0;
		$outArr = array();
		$accumulator = 0;
		foreach ($strArr as $value) {
			if ($value >= 'a' && $value <= 'z') {
				$charBits = 0b100100 + (ord($value) - ord('a'));
			} else if ($value >= 'A' && $value <= 'Z') {
				$charBits = 0b001010 + (ord($value) - ord('A'));
			} else if ($value >= '0' && $value <= '9') {
				$charBits = ord($value) - ord('0');
			} else if ($value === ' ') {
				$charBits = 0b00111110;
			} else if ($value === '.') {
				$charBits = 0b00111111;
			} else {
				continue;
			}
			$accumulator = ($accumulator << 6) + $charBits;
			$bitCount += 6;
			$this->processCSCodeBytes($bitCount, $accumulator, $outArr);
		}
		while (count($outArr) < $targetByteLen) {
			$accumulator = ($accumulator << 6) + 0b111110; // add null character code
			$bitCount += 6;
			$this->processCSCodeBytes($bitCount, $accumulator, $outArr);
		}
		if ($bitCount > 0) {
			// Write out any left over bits, zero padding at the end.
			// This should not happen unless input was invalid.
			$outArr[] = ($accumulator << (8-$bitCount));
		}
		return $outArr;
	}

	protected function writeGeneralSettings($fh, &$generalSettings) {
		fseek($fh, 0x2200);
		$nameArr = createUnicodeStrArr($generalSettings->getInfoScreenLine1(), 16);
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

		fseek($fh, 0x2228);
		$nameArr = createUnicodeStrArr($generalSettings->getInfoScreenLine2(), 16);
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

		fseek($fh, 0x2220);
		$data = pack("CCC",
				($generalSettings->getRadioId() & 0x0000FF),
				($generalSettings->getRadioId() & 0x00FF00) >> 8,
				($generalSettings->getRadioId() & 0xFF0000) >> 16);
		fwrite($fh, $data);
	}

	protected function writeChannels($fh, &$channelArr, &$contactArr, &$scanListArr, &$rxGroupListArr) {
		$channelCount = count($channelArr);

		for ($channelRowNum = 0; $channelRowNum < $channelCount; $channelRowNum++) {
			$channel = $channelArr[$channelRowNum];
			$this->writeChannel($fh, $channel, $channelRowNum+1, $rxGroupListArr, $contactArr, $scanListArr);
		}

		fseek($fh, 0x21F60);
		$data = pack("v", $channelCount);
		fwrite($fh, $data);

		fseek($fh, 0x2064);
		$data = pack("v", 0x4000 | (count($contactArr) << 4));
		fwrite($fh, $data);
	}

	protected function writeChannel($fh, $channel, $channelNum, &$rxGroupListArr, &$contactArr, &$scanListArr) {
		fseek($fh, 0x21F60 + (2 * $channelNum));
		$data = pack("v", $channelNum);
		fwrite($fh, $data);

		fseek($fh, 0xA000 + (0x10 * ($channelNum-1)));
		$nameArr = $this->convertStringToCSCode($channel->getChannelName(), 16);
		$data = pack("CCCCCCCCCCCC",
				$nameArr[0],
				$nameArr[1],
				$nameArr[2],
				$nameArr[3],
				$nameArr[4],
				$nameArr[5],
				$nameArr[6],
				$nameArr[7],
				$nameArr[8],
				$nameArr[9],
				$nameArr[10],
				$nameArr[11]
				);
		fwrite($fh, $data);

		fseek($fh, 0x12000 + (32 * ($channelNum-1)));
		$txFreq = $channel->getTxFrequency() * 1000000;
		$rxFreq = $channel->getRxFrequency() * 1000000;
		$freqRef = 0;
		$flags1 = 0b10000000;
		$flags2 = 0;
		switch ($channel->getRxRefFrequency()) {
			case 'Low': $freqRef |= 0b00000000; break;
			case 'High': $freqRef |= 0b00001000; break;
			default: $freqRef |= 0b00000100; break;
		}
		switch ($channel->getTxRefFrequency()) {
			case 'Low': $freqRef |= 0b00100000; break;
			case 'High': $freqRef |= 0b00000000; break;
			default: $freqRef |= 0b00010000; break;
		}
		if ($channel->getMode() == 'Digital' || ($channel->getMode() == 'Analog' && $channel->getBandwidth() == '12.5')) {
			$freqRef |= 0b00000010;
		}
		if ($channel->getMode() == 'Analog') {
			$freqRef |= 0b00000001;
		}

		if ($channel->isAutoScan()) {
			$flags1 |= 0b00000001;
		}
		if ($channel->isRxOnly()) {
			$flags1 |= 0b00000010;
		}
		if ($channel->isVox()) {
			$flags1 |= 0b00001000;
		}
		if ($channel->isAllowTalkaround()) {
			$flags1 |= 0b00010000;
		}
		if ($channel->getMode() == 'Analog' && $channel->getSquelch() == 'Normal') {
			$flags1 |= 0b01000000;
		}

		if ($channel->getPower() == 'High') {
			$flags2 |= 0b10000000;
		} else if ($channel->getPower() == 'Medium') {
			$flags2 |= 0b01000000;
		}

		if ($channel->getMode() == 'Digital') {
			if ($channel->getAdmitCriteria() == 'Color Code') {
				$flags2 |= 0b00010000;
			} else if ($channel->getAdmitCriteria() == 'Channel Free') {
				$flags2 |= 0b00001000;
			}
		} else {
			switch ($channel->getAdmitCriteria()) {
				case 'Always': $flags2 |= 0b00001000; break;
				case 'Channel Free': $flags |= 0b00010000; break;
				case 'CTCSS/CDCSS Locked': $flags |= 0b00011000; break;
				case 'Audio':  $flags |= 0b00100000; break;
			}
		}

		$totVal = max(0, min($channel->getTot() / 15, 0x21)); // Max value if 495s

		$scanListIndex = findScanListIndex($scanListArr, $channel->getScanListName());
		if ($scanListIndex == 0) {
			$scanListIndex = 0xFFFF;
		}

		$totPreAlert = 0; // FIXME
		if ($channel->getMode() == 'Digital') {
			$colorCodeBytes = max(0, min(15, $channel->getColorCode()));
			if ($channel->getSlot() == 'TS2') {
				$colorCodeBytes |= 0b00010000;
			}
			if ($channel->isDataCallConf()) {
				$colorCodeBytes |= 0b10000000;
			}
			if ($channel->isPrivateCallConf() && $channel->getAdmitCriteria() != 'Always') {
				$colorCodeBytes |= 0b00100000;
			}
			$txCtcss = 0;
		} else {
			$colorCodeBytes = createToneBCDT($channel->getCtcssDcsDecode());
			$txCtcss = createToneBCDT($channel->getCtcssDcsEncode());
		}

		$rxGroupListIndex = findGroupListIndex($rxGroupListArr, $channel->getGroupListName());
		if ($channel->getMode() == 'Digital') {
			$txContactIndex = findContactNameIndex($contactArr, $channel->getContactName());
		} else {
			$txContactIndex = 0;
			if ($channel->getQtReverse() == '120') {
				$txContactIndex |= 0;
			} else {
				$txContactIndex |= 0b00000010;
			}
		}

		$data = pack("VVCCCCvCCvvCCCCC",
				$txFreq, // Offset 0x00
				$rxFreq, // Offset 0x04
				$freqRef, // Offset 0x08
				$flags1, // Offset 0x09
				$flags2, // Offset 0x0A
				$totVal, // Offset 0x0B
				$scanListIndex, // Offset 0x0C
				max(0, min(255, $channel->getTotRekeyDelay())), // Offset 0x0E
				$totPreAlert, // Offset 0x0F
				$colorCodeBytes, // Offset 0x10
				$txCtcss, // Offset 0x12
				0, // Offset 0x14
				0, // Offset 0x15
				$rxGroupListIndex, // Offset 0x16
				($channel->getMode() == 'Digital' ? 1 : 0), // Offset 0x17
				$txContactIndex // Offset 0x18
			);
		fwrite($fh, $data);

		if ($channel->getMode() != 'Digital') {
			$rxSquelchMode = 0x00;
			switch ($channel->getRxSquelchMode()) {
				case 'CTCSS/DCS and Audio': $rxSquelchMode = 0x00; break;
				case 'Audio': $rxSquelchMode = 0x00; break;
				case 'CTCSS/DCS': $rxSquelchMode = 0x02; break;
				case 'Carrier': $rxSquelchMode = 0x03; break;
			}

			if ($channel->getChannelSwitchSquelchMode() == 'Monitor Squelch Mode') {
				$rxSquelchMode |= 0b01000000;
			}

			if ($channel->getMonitorSquelchMode() == 'CTCSS/CDCSS') {
				$rxSquelchMode |= 0b00010000;
			}

			$toneType = 0x00;
			switch($channel->getRxToneType()) {
				case 'CTCSS': $toneType |= 0x01; break;
				case 'CDCSS': $toneType |= 0x02; break;
				case 'CDCSS Invert': $toneType |= 0x03; break;
			}

			switch($channel->getTxToneType()) {
				case 'CTCSS': $toneType |= 0b00000100; break;
				case 'CDCSS': $toneType |= 0b00001000; break;
				case 'CDCSS Invert': $toneType |= 0b00001100; break;
			}

			$data = pack("vv", $rxSquelchMode, $toneType);
			fwrite($fh, $data);
		}
	}

	protected function writeContacts(&$fh, &$contactArr) {
		$contactCount = min(count($contactArr), 1000);
		fseek($fh, 0x9568);
		$data = pack("v", $contactCount);
		fwrite($fh, $data);
		for ($contactRowNum = 0; $contactRowNum < $contactCount; $contactRowNum++) {
			$contact = $contactArr[$contactRowNum];
			$this->writeContact($fh, $contactRowNum+1, $contact->getContactNum(), $contact->getContactType(), $contact->getContactName(), $contact->isCallReceiveTone());
		}
	}

	protected function writeContact(&$fh, $contactNum, $callId, $callType, $name, $recvTone = false) {
		$contactOffset = (16 * ($contactNum-1));
		fseek($fh, 0x44000 + $contactOffset);
		$callId1 = $callId & 0xFF;
		$callId2 = ($callId >> 8) & 0xFF;
		$callId3 = ($callId >> 16) & 0xFF;

		$nameArr = $this->convertStringToCSCode($name, 16);
		switch ($callType) {
			case 'G':
				$flags = 0b00000001;
				break;
			case 'A':
				$flags = 0b00000010;
				break;
			default:
				$flags = 0;
				break;
		}
		if ($recvTone === true) {
			$flags |= 0b00001000;
		}
		fseek($fh, 0x44000 + $contactOffset);

		$data = pack("CCCCCCCCCCCCCCCC", $callId1, $callId2, $callId3,
			$nameArr[0],
			$nameArr[1],
			$nameArr[2],
			$nameArr[3],
			$nameArr[4],
			$nameArr[5],
			$nameArr[6],
			$nameArr[7],
			$nameArr[8],
			$nameArr[9],
			$nameArr[10],
			$nameArr[11],
			$flags
			);
		fwrite($fh, $data);
	}

	protected function writeRxGroupLists(&$fh, $rxGroupArr, &$contactArr) {
		$groupCount = min(count($rxGroupArr), 250);

		// Write group count
		fseek($fh, 0x93E8);
		$data = pack("v", $groupCount);
		fwrite($fh, $data);

		// Write list of group indices
		fseek($fh, 0x93EA);
		for ($rxGroupRowNum = 1; $rxGroupRowNum <= $groupCount; $rxGroupRowNum++) {
			$data = pack("C", $rxGroupRowNum);
			fwrite($fh, $data);
		}

		// Write group details
		for ($rxGroupRowNum = 0; $rxGroupRowNum < $groupCount; $rxGroupRowNum++) {
			$group = $rxGroupArr[$rxGroupRowNum];
			$grpListName = $group->getGroupListName();
			$contactNames = $group->getContactNames();
			$this->writeRxGroupList($fh, $rxGroupRowNum+1, $grpListName, $contactNames, $contactArr);
		}
	}

	protected function writeRxGroupList(&$fh, $rxGroupListNum, $rxGroupListName, &$contactNameArr, &$contactArr) {
		$groupOffset = (100 * ($rxGroupListNum-1));
		fseek($fh, 0x3000 + $groupOffset);

		$nameArr = createUnicodeStrArr($rxGroupListName, 16);
		$data = pack("CCCCvvvvvvvvvvvvvvvv",
				count($contactNameArr), 0, 0, 0,
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

		$contactCount = 0;
		foreach ($contactNameArr as $contactName) {
			$data = pack("v",
					findContactNameIndex($contactArr, $contactName));
			fwrite($fh, $data);
			$contactCount++;
			if ($contactCount >= 32) {
				break;
			}
		}
	}

	protected function writeZones(&$fh, $zoneArr, &$channelArr) {
		$zoneCount = min(count($zoneArr), 250);
		for ($zoneRowNum = 0; $zoneRowNum < $zoneCount; $zoneRowNum++) {
			$zone = $zoneArr[$zoneRowNum];
			$this->writeZone($fh, $zoneRowNum+1, $zone->getZoneName(), $zone->getChannelNames(), $channelArr);
		}
	}
	
	protected function writeZone(&$fh, $zoneNum, $zoneName, $channelNameArr, &$channelArr) {
		$zoneOffset = (80 * ($zoneNum-1));
		fseek($fh, 0x26000 + $zoneOffset);
		
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
				unicodeCharToBinValue($nameArr[15])
				);
		fwrite($fh, $data);
		
		fseek($fh, 0x26024 + $zoneOffset);
		$data = pack("CCC",
				count($channelNameArr),
				0x01,
				0x00);
		fwrite($fh, $data);
		
		fseek($fh, 0x26030 + $zoneOffset);
		foreach ($channelNameArr as $channelName) {
			$channelIndex = findChannelNameIndex($channelArr, $channelName);
			$data = pack("v", $channelIndex);
			fwrite($fh, $data);
		}
	}

	protected function writeScanLists(&$fh, $scanListArr, &$channelArr) {
		$listCount = min(count($scanListArr), 250);

		// Write scan list count
		fseek($fh, 0x33500);
		$data = pack("v", $listCount);
		fwrite($fh, $data);

		// Write list of scan list indices
		fseek($fh, 0x33502);
		for ($scanListArrRowNum = 1; $scanListArrRowNum <= $listCount; $scanListArrRowNum++) {
			$data = pack("C", $scanListArrRowNum);
			fwrite($fh, $data);
		}

		// Write scan list details
		for ($scanListArrRowNum = 0; $scanListArrRowNum < $listCount; $scanListArrRowNum++) {
			$list = $scanListArr[$scanListArrRowNum];
			$this->writeScanList($fh, $scanListArrRowNum+1, $list, $channelArr);
		}
	}
	
	protected function writeScanList(&$fh, $scanListNum, &$scanList, &$channelArr) {
		$scanListOffset = (128 * ($scanListNum-1));
		fseek($fh, 0x2C000 + $scanListOffset);
		
		$nameArr = createUnicodeStrArr($scanList->getScanListName(), 16);
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

		$priChan1 = 0xFFFF; // None
		if ($scanList->getPriorityChannel1() === 'Selected') {
			$priChan1 = 0x0000;
		} else if ($scanList->getPriorityChannel1() === 'None') {
			$priChan1 = 0xFFFF;
		} else {
			$foundChan = findChannelNameIndex($channelArr, $scanList->getPriorityChannel1());
			if ($foundChan != 0) {
				$priChan1 = $foundChan;
			} else {
				addWarning("Priority channel 1 for scan list ".htmlspecialchars($scanList->getScanListName())." was not matched");
			}
		}

		$priChan2 = 0xFFFF; // None
		if ($scanList->getPriorityChannel2() === 'Selected') {
			$priChan2 = 0x0000;
		} else if ($scanList->getPriorityChannel2() === 'None') {
			$priChan2 = 0xFFFF;
		} else {
			$foundChan = findChannelNameIndex($channelArr, $scanList->getPriorityChannel2());
			if ($foundChan != 0) {
				$priChan2 = $foundChan;
			} else {
				addWarning("Priority channel 2 for scan list ".htmlspecialchars($scanList->getScanListName())." was not matched");
			}
		}

		$txChan = 0x0000; // Selected
		if ($scanList->getTxDesignatedChannel() === 'Selected') {
			$txChan= 0x0000;
		} else if ($scanList->getTxDesignatedChannel() === 'Last') {
			$txChan= 0xFFFF;
		} else {
			$foundChan = findChannelNameIndex($channelArr, $scanList->getTxDesignatedChannel());
			if ($foundChan != 0) {
				$txChan= $foundChan;
			} else {
				addWarning("Priority channel 2 for scan list ".htmlspecialchars($scanList->getScanListName())." was not matched");
			}
		}

		$signalHoldTime = max(min($scanList->getSignalHoldTime() / 25, 0xFF), 0x02);

		$data = pack("vvvCC",
				$priChan1, $priChan2, $txChan,
				min(count($scanList->getChannelNames()), 32),
				$signalHoldTime
				);
		fwrite($fh, $data);

		fseek($fh, 0x2C029 + $scanListOffset);
		$data = pack("CCC",
				0x0D, // TODO: Various flags
				0x14, // TODO: Loop Back Time A
				0x14 // TODO: Loop Back Time B
			);
		fwrite($fh, $data);

		fseek($fh, 0x2C042 + $scanListOffset);
		$channelArrCount = 0;
		foreach ($scanList->getChannelNames() as $channelName) {
			$data = pack("v",
					findChannelNameIndex($channelArr, $channelName));
			fwrite($fh, $data);
			$channelArrCount++;
			if ($channelArrCount >= 32) {
				break;
			}
		}
	}
}
