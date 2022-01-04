<?php

declare(strict_types=1);

namespace ShockedPlot7560\sitemap;

class Frequency{

	public const FREQUENCY_NEVER = 0;
	public const FREQUENCY_YEARLY = 1;
	public const FREQUENCY_MONTHLY = 2;
	public const FREQUENCY_WEEKLY = 3;
	public const FREQUENCY_DAILY = 4;
	public const FREQUENCY_HOURLY = 5;
	public const FREQUENCY_ALWAYS = 6;

	private int $freq;

	public function __construct(int $freq){
		$this->freq = $freq;
	}

	public function getFreq() : int {
		return $this->freq;
	}

	public function __toString() : string{
		switch ($this->getFreq()) {
			case self::FREQUENCY_NEVER:
				return "never";
			case self::FREQUENCY_ALWAYS:
				return "always";
			case self::FREQUENCY_YEARLY:
				return "yearly";
			case self::FREQUENCY_MONTHLY:
				return "monthly";
			case self::FREQUENCY_WEEKLY:
				return "weekly";
			case self::FREQUENCY_DAILY:
				return "daily";
			case self::FREQUENCY_HOURLY:
				return "hourly";
		}
	}
}