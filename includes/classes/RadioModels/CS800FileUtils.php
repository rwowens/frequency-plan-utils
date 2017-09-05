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
	// 		writeRDTGeneralSettings($fh, $spreadsheetData->getGeneralSettings());
	// 		writeRDTMenuItems($fh, $spreadsheetData->getMenuItemsMap());
	// 		writeRDTButtonDefinitions($fh, $spreadsheetData->getButtonDefinitions(), $spreadsheetData->getTextMessageArray(), $spreadsheetData->getContactArray());
			$this->writeContacts($fh, $spreadsheetData->getContactArray());
	// 		writeRxGroupLists($fh, $spreadsheetData->getRxGroupListArray(), $spreadsheetData->getContactArray());
	 		$this->writeChannels($fh, $spreadsheetData->getChannelArray(), $spreadsheetData->getContactArray(), $spreadsheetData->getScanListArray(), $spreadsheetData->getRxGroupListArray());
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

	protected function writeChannels($fh, &$channelArr, &$contactArr, &$scanListArr, &$rxGroupListArr) {
		$channelCount = count($channelArr);

		for ($channelRowNum = 0; $channelRowNum < $channelCount; $channelRowNum++) {
			$channel = $channelArr[$channelRowNum];
			$this->writeChannel($fh, $channel, $channelRowNum+1, $rxGroupListArr, $contactArr);
		}
	}

	protected function writeChannel($fh, $channel, $channelNum, &$rxGroupListArr, &$contactArr) {
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

		$scanListIndex = 0xFFFF; // FIXME
		$totPreAlert = 0; // FIXME
		if ($channel->getMode() == 'Digital') {
			$colorCodeBytes = max(0, min(15, $channel->getColorCode()));
			if ($channel->getSlot() == 'TS2') {
				$colorCodeBytes |= 0b00010000;
			}
			if ($channel->isDataCallConf()) {
				$colorCodeBytes |= 0b10000000;
			}
			if ($channel->isPrivateCallConf() && $chanel->getAdmitCriteria() != 'Always') {
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
	}

	protected function writeContacts($fh, &$contactArr) {
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
}