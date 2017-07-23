<?php
class Channel {
	private $channelName;
	private $isLoneWorker;
	private $squelch;
	private $isAutoScan;
	private $bandwidth;
	private $mode;
	private $colorCode;
	private $slot;
	private $isRxOnly;
	private $isAllowTalkaround;
	private $isDataCallConf;
	private $isPrivateCallConf;
	private $isDisplayPttId;
	private $isCompressedUdpHeader;
	private $rxRefFrequency;
	private $admitCriteria;
	private $power;
	private $isVox;
	private $qtReverse;
	private $isReverseBurst;
	private $txRefFrequency;
	private $contactName;
	private $tot;
	private $totRekeyDelay;
	private $scanListName;
	private $groupListName;
	private $decode18;
	private $rxFrequency;
	private $txFrequency;
	private $ctcssDcsDecode;
	private $ctcssDcsEncode;
	private $txSignalingSystem;
	private $rxSignalingSystem;
	private $impScanListIdx;
	private $originalIndex;

	public function __construct(
			$channelName,
			$isLoneWorker,
			$squelch,
			$isAutoScan,
			$bandwidth,
			$mode,
			$colorCode,
			$slot,
			$isRxOnly,
			$isAllowTalkaround,
			$isDataCallConf,
			$isPrivateCallConf,
			$isDisplayPttId,
			$isCompressedUdpHeader,
			$rxRefFrequency,
			$admitCriteria,
			$power,
			$isVox,
			$qtReverse,
			$isReverseBurst,
			$txRefFrequency,
			$contactName,
			$tot,
			$totRekeyDelay,
			$scanListName,
			$groupListName,
			$decode18,
			$rxFrequency,
			$txFrequency,
			$ctcssDcsDecode,
			$ctcssDcsEncode,
			$txSignalingSystem,
			$rxSignalingSystem,
			$impScanListIdx = NULL,
			$originalIndex = NULL
			) {
				$this->admitCriteria = $admitCriteria;
				$this->bandwidth = $bandwidth;
				$this->channelName = $channelName;
				$this->colorCode = $colorCode;
				$this->contactName = $contactName;

				if (preg_match("/^\d{2,3}$/", $ctcssDcsDecode)) {
					$ctcssDcsDecode = $ctcssDcsDecode.'.0';
				}
				$this->ctcssDcsDecode = $ctcssDcsDecode;

				if (preg_match("/^\d{2,3}$/", $ctcssDcsEncode)) {
					$ctcssDcsEncode = $ctcssDcsEncode.'.0';
				}
				$this->ctcssDcsEncode = $ctcssDcsEncode;

				$this->groupListName = $groupListName;
				$this->isAllowTalkaround = $isAllowTalkaround;
				$this->isAutoScan = $isAutoScan;
				$this->isCompressedUdpHeader = $isCompressedUdpHeader;
				$this->isDataCallConf = $isDataCallConf;
				$this->isDisplayPttId = $isDisplayPttId;
				$this->isLoneWorker = $isLoneWorker;
				$this->isPrivateCallConf = $isPrivateCallConf;
				$this->isRxOnly = $isRxOnly;
				$this->isVox = $isVox;
				$this->mode = $mode;
				$this->power = $power;
				if ($mode != 'Digital' && $ctcssDcsEncode != NULL && $ctcssDcsEncode != 'None') {
					$this->qtReverse = $qtReverse;
					$this->isReverseBurst = $isReverseBurst;
				} else {
					if ($qtReverse != 180 && $qtReverse != NULL) {
						addWarning("For channel ".$channelName.", Qt Reverse must be 180 when CTCSS DCS Encode is blank");
					}
					if ($isReverseBurst != TRUE && $isReverseBurst != NULL) {
						addWarning("For channel ".$channelName.", Reverse burst must be on when CTCSS DCS Encode is blank");
					}
					$this->qtReverse = 180;
					$this->isReverseBurst = TRUE;
				}
				$this->rxFrequency = $rxFrequency;
				$this->rxRefFrequency = $rxRefFrequency;
				$this->scanListName = $scanListName;
				$this->slot = $slot;
				$this->squelch = $squelch;
				$this->tot = $tot;
				$this->totRekeyDelay = $totRekeyDelay;
				$this->txFrequency = $txFrequency;
				$this->txRefFrequency = $txRefFrequency;
				$this->txSignalingSystem = $txSignalingSystem;
				$this->rxSignalingSystem = $rxSignalingSystem;
				if ($rxSignalingSystem == 'Off') {
					$this->decode18 = 0;
					if ($decode18 != 0 && $decode18 != NULL) {
						addWarning("For channel ".$channelName.", Decode 18 must be 0 or blank when Rx Signaling System is off");
					}
				} else {
					$this->decode18 = $decode18;
				}
				$this->impScanListIdx = $impScanListIdx;
				$this->originalIndex = $originalIndex;
	}

	public function getChannelName() { return $this->channelName; }
	public function isLoneWorker() { return $this->isLoneWorker; }
	public function getSquelch() { return $this->squelch; }
	public function isAutoScan() { return $this->isAutoScan; }
	public function getBandwidth() { return $this->bandwidth; }
	public function getMode() { return $this->mode; }
	public function getColorCode() { return $this->colorCode; }
	public function getSlot() { return $this->slot; }
	public function isRxOnly() { return $this->isRxOnly; }
	public function isAllowTalkaround() { return $this->isAllowTalkaround; }
	public function isDataCallConf() { return $this->isDataCallConf; }
	public function isPrivateCallConf() { return $this->isPrivateCallConf; }
	public function isDisplayPttId() { return $this->isDisplayPttId; }
	public function isCompressedUdpHeader() { return $this->isCompressedUdpHeader; }
	public function getRxRefFrequency() { return $this->rxRefFrequency; }
	public function getAdmitCriteria() { return $this->admitCriteria; }
	public function getPower() { return $this->power; }
	public function isVox() { return $this->isVox; }
	public function getQtReverse() { return $this->qtReverse; }
	public function isReverseBurst() { return $this->isReverseBurst; }
	public function getTxRefFrequency() { return $this->txRefFrequency; }
	public function getContactName() { return $this->contactName; }
	public function getTot() { return $this->tot; }
	public function getTotRekeyDelay() { return $this->totRekeyDelay; }
	public function getScanListName() { return $this->scanListName; }
	public function getGroupListName() { return $this->groupListName; }
	public function getDecode18() { return $this->decode18; }
	public function getRxFrequency() { return $this->rxFrequency; }
	public function getTxFrequency() { return $this->txFrequency; }
	public function getCtcssDcsDecode() { return $this->ctcssDcsDecode; }
	public function getCtcssDcsEncode() { return $this->ctcssDcsEncode; }
	public function getTxSignalingSystem() { return $this->txSignalingSystem; }
	public function getRxSignalingSystem() { return $this->rxSignalingSystem; }
	public function getImportScanListIndex() { return $this->impScanListIdx; }
	public function getOriginalIndex() { return $this->originalIndex; }
}
?>