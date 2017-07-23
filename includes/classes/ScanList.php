<?php
class ScanList {
	private $scanListName;
	private $priorityChannel1;
	private $priorityChannel2;
	private $txDesignatedChannel;
	private $signalHoldTime;
	private $prioritySampleTime;
	private $channelNames;
	private $originalIndex;

	public function __construct($scanListName, $priorityChannel1, $priorityChannel2, $txDesignatedChannel, $signalHoldTime, $prioritySampleTime, $channelNames, $origIndex = NULL) {
		$this->scanListName = $scanListName;
		$this->priorityChannel1 = $priorityChannel1;
		$this->priorityChannel2 = $priorityChannel2;
		$this->txDesignatedChannel = $txDesignatedChannel;
		$this->signalHoldTime = $signalHoldTime;
		$this->prioritySampleTime = $prioritySampleTime;
		$this->channelNames = $channelNames;
		$this->originalIndex = $origIndex;
	}

	public function getScanListName() { return $this->scanListName; }
	public function getPriorityChannel1() { return $this->priorityChannel1; }
	public function getPriorityChannel2() { return $this->priorityChannel2; }
	public function getTxDesignatedChannel() { return $this->txDesignatedChannel; }
	public function getSignalHoldTime() { return $this->signalHoldTime; }
	public function getPrioritySampleTime() { return $this->prioritySampleTime; }
	public function getChannelNames() { return $this->channelNames; }
	public function getOriginalIndex() { return $this->originalIndex; }
}
?>