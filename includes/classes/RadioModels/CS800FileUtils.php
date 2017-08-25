<?php
namespace RadioModels;

class CS800FileUtils implements \RadioFileUtils {
	public function generateRadioFile($baseSpreadsheetId, $personalSpreadsheetId) {
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
			writeContacts($fh, $spreadsheetData->getContactArray());
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

	protected function writeRDBContacts($fh, $contactArr) {
		$contactCount = min(count($contactArr), 1000);
		for ($contactRowNum = 0; $contactRowNum < $contactCount; $contactRowNum++) {
			$contact = $contactArr[$contactRowNum];
			writeRDBDigitalContact($fh, $contactRowNum+1, $contact->getContactNum(), $contact->getContactType(), $contact->getContactName(), $contact->isCallReceiveTone());
		}
	}

	protected function writeRDBContact(&$fh, $contactNum, $callId, $callType, $name, $recvTone = false) {
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