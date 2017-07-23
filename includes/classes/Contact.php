<?php
class Contact {
	private $contactName;
	private $contactNum;
	private $contactType;
	private $callReceiveTone;
	private $origIndex;

	public function __construct($contactName, $contactNum, $contactType, $callTone, $origIndex = -1) {
		$this->contactName = $contactName;
		$this->contactNum = $contactNum;
		$this->contactType = $contactType;
		$this->callReceiveTone = $callTone;
		$this->origIndex = $origIndex;
	}

	public function getContactName() { return $this->contactName; }
	public function getContactNum() { return $this->contactNum; }
	public function getContactType() { return $this->contactType; }
	public function isCallReceiveTone() { return $this->callReceiveTone; }
	public function getOriginalIndex() { return $this->origIndex; }
}
?>