<?php
class ZoneInfo {
	private $zoneName;
	private $channelNames;

	public function __construct($zoneName, $channelNames) {
		$this->zoneName = $zoneName;
		$this->channelNames = $channelNames;
	}

	public function getZoneName() { return $this->zoneName; }
	public function getChannelNames() { return $this->channelNames; }
}
?>