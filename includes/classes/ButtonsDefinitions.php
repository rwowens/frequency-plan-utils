<?php
class ButtonsDefinitions {
	private $longPressDuration;
	private $sideButton1ShortPress;
	private $sideButton1LongPress;
	private $sideButton2ShortPress;
	private $sideButton2LongPress;
	private $oneTouch1;
	private $oneTouch1Call;
	private $oneTouch1Messsage;
	private $oneTouch2;
	private $oneTouch2Call;
	private $oneTouch2Messsage;
	private $oneTouch3;
	private $oneTouch3Call;
	private $oneTouch3Messsage;
	private $oneTouch4;
	private $oneTouch4Call;
	private $oneTouch4Messsage;
	private $oneTouch5;
	private $oneTouch5Call;
	private $oneTouch5Messsage;
	private $oneTouch6;
	private $oneTouch6Call;
	private $oneTouch6Messsage;
	private $quickKey0;
	private $quickKey1;
	private $quickKey2;
	private $quickKey3;
	private $quickKey4;
	private $quickKey5;
	private $quickKey6;
	private $quickKey7;
	private $quickKey8;
	private $quickKey9;

	public function __construct($longPressDuration,
			$sideButton1ShortPress,
			$sideButton1LongPress,
			$sideButton2ShortPress,
			$sideButton2LongPress,
			$oneTouch1,
			$oneTouch1Call,
			$oneTouch1Message,
			$oneTouch2,
			$oneTouch2Call,
			$oneTouch2Message,
			$oneTouch3,
			$oneTouch3Call,
			$oneTouch3Message,
			$oneTouch4,
			$oneTouch4Call,
			$oneTouch4Message,
			$oneTouch5,
			$oneTouch5Call,
			$oneTouch5Message,
			$oneTouch6,
			$oneTouch6Call,
			$oneTouch6Message,
			$quickKey0,
			$quickKey1,
			$quickKey2,
			$quickKey3,
			$quickKey4,
			$quickKey5,
			$quickKey6,
			$quickKey7,
			$quickKey8,
			$quickKey9) {
		$this->longPressDuration = $longPressDuration;
		$this->sideButton1ShortPress = $sideButton1ShortPress;
		$this->sideButton1LongPress = $sideButton1LongPress;
		$this->sideButton2ShortPress = $sideButton2ShortPress;
		$this->sideButton2LongPress = $sideButton2LongPress;
		$this->oneTouch1 = $oneTouch1;
		$this->oneTouch1Call = $oneTouch1Call;
		$this->oneTouch1Messsage = $oneTouch1Message;
		$this->oneTouch2 = $oneTouch2;
		$this->oneTouch2Call = $oneTouch2Call;
		$this->oneTouch2Messsage = $oneTouch2Message;
		$this->oneTouch3 = $oneTouch3;
		$this->oneTouch3Call = $oneTouch3Call;
		$this->oneTouch3Messsage = $oneTouch3Message;
		$this->oneTouch4 = $oneTouch4;
		$this->oneTouch4Call = $oneTouch4Call;
		$this->oneTouch4Messsage = $oneTouch4Message;
		$this->oneTouch5 = $oneTouch5;
		$this->oneTouch5Call = $oneTouch5Call;
		$this->oneTouch5Messsage = $oneTouch5Message;
		$this->oneTouch6 = $oneTouch6;
		$this->oneTouch6Call = $oneTouch6Call;
		$this->oneTouch6Messsage = $oneTouch6Message;
		$this->quickKey0 = $quickKey0;
		$this->quickKey1 = $quickKey1;
		$this->quickKey2 = $quickKey2;
		$this->quickKey3 = $quickKey3;
		$this->quickKey4 = $quickKey4;
		$this->quickKey5 = $quickKey5;
		$this->quickKey6 = $quickKey6;
		$this->quickKey7 = $quickKey7;
		$this->quickKey8 = $quickKey8;
		$this->quickKey9 = $quickKey9;
		
	}

	public function getLongPressDuration() { return $this->longPressDuration; } // x*250ms
	public function getSideButton1ShortPress() { return $this->sideButton1ShortPress; }
	public function getSideButton1LongPress() { return $this->sideButton1LongPress; }
	public function getSideButton2ShortPress() { return $this->sideButton2ShortPress; }
	public function getSideButton2LongPress() { return $this->sideButton2LongPress; }
	public function getOneTouch1() { return $this->oneTouch1; }
	public function getOneTouch1Call() { return $this->oneTouch1Call; }
	public function getOneTouch1Message() { return $this->oneTouch1Messsage; }
	public function getOneTouch2() { return $this->oneTouch2; }
	public function getOneTouch2Call() { return $this->oneTouch2Call; }
	public function getOneTouch2Message() { return $this->oneTouch2Messsage; }
	public function getOneTouch3() { return $this->oneTouch3; }
	public function getOneTouch3Call() { return $this->oneTouch3Call; }
	public function getOneTouch3Message() { return $this->oneTouch3Messsage; }
	public function getOneTouch4() { return $this->oneTouch4; }
	public function getOneTouch4Call() { return $this->oneTouch4Call; }
	public function getOneTouch4Message() { return $this->oneTouch4Messsage; }
	public function getOneTouch5() { return $this->oneTouch5; }
	public function getOneTouch5Call() { return $this->oneTouch5Call; }
	public function getOneTouch5Message() { return $this->oneTouch5Messsage; }
	public function getOneTouch6() { return $this->oneTouch6; }
	public function getOneTouch6Call() { return $this->oneTouch6Call; }
	public function getOneTouch6Message() { return $this->oneTouch6Messsage; }
	public function getQuickKey0() { return $this->quickKey0; }
	public function getQuickKey1() { return $this->quickKey1; }
	public function getQuickKey2() { return $this->quickKey2; }
	public function getQuickKey3() { return $this->quickKey3; }
	public function getQuickKey4() { return $this->quickKey4; }
	public function getQuickKey5() { return $this->quickKey5; }
	public function getQuickKey6() { return $this->quickKey6; }
	public function getQuickKey7() { return $this->quickKey7; }
	public function getQuickKey8() { return $this->quickKey8; }
	public function getQuickKey9() { return $this->quickKey9; }
	
/*

0x2326 = long press (range of 0x04 - 0x0F)
0x2327 Side button 1 short press:	0x00 = Unassigned (default)
									0x01 = All Alert Tones On/Off
									0x02 = Emergency On
									0x03 = Emergency Off
									0x04 = High/Low Power
									0x05 = Monitor
									0x06 = Nuisance Delete
									0x07 = One Touch Access 1
									0x08 = 2
									0x09 = 3
									0x0A = 4
									0x0B = 5
									0x0C = One Touch Access 6
									0x0D = Repeater/Talkaround
									0x0E = Scan On/Off
									0x15 = Tight/Normal Squelch
									0x16 = Privacy On/Off
									0x17 = VOX On/Off
									0x18 = Zone Select
									0x1E = Manual Dial For Private
									0x1F = Lone Work On/Off
0x2328 Side button 1 long press: same as above
0x2329 Side button 2 short press: same as above
0x232A Side button 2 long press: same as above

0x2339 One Touch Access #1 Digital Text=D1; Digital Call=D0; Analog DTMF-1=E8; Analog DTMF-2=E9; Analog DTMF-3=EA; DTMF-4=EB; None=C1
0x233A 1 byte text message #
0x233B 2 bytes Contact # as little (?) endian
0x233D One Touch Access #2 Digital=D1; Analog=E8; None=C1

0x2351 2 bytes Number key 0 quick contact access = contact # little(?) endian
0x2353 2 bytes Number key 1 quick contact access = contact # little(?) endian
0x2355 2 bytes Number key 2 quick contact access = contact # little(?) endian
0x2357 #3
0x2359 #4
0x235B #5
0x235D #6
0x235F #7
0x2361 #8
0x2363 #9
 */
}
?>