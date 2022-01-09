<?php

declare(strict_types=1);

namespace ShockedPlot7560\sitemap;

use DateTime;
use Exception;

use function str_replace;

class Url{
	private string $location;
	private null|float $priority = null;
	private null|Frequency $changeFreq = null;
	private null|DateTime $lastMod = null;

	public function __construct(string $location){
		$this->location = $location;
	}

	public function getLocation() : string{
		return $this->location;
	}

	public function getPriority() : ?float{
		return $this->priority;
	}

	public function getChangeFreq() : ?Frequency{
		return $this->changeFreq;
	}

	public function getLastMod() : ?DateTime{
		return $this->lastMod;
	}

	public function setLocation(string $location) : self{
		$this->location = $location;
		return $this;
	}

	public function setPriority(?float $priority = null) : self{
		$this->priority = $priority;
		return $this;
	}

	public function setChangeFreq(?Frequency $changeFreq = null) : self{
		$this->changeFreq = $changeFreq;
		return $this;
	}

	public function setLastMod(?DateTime $lastMod = null) : self{
		$this->lastMod = $lastMod;
		return $this;
	}

	public function convertToXml() : string{
		$base = "<url>%{content}</url>\n";
		$content = "<loc>" . $this->getLocation() . "</loc>\n";
		if($this->getChangeFreq() !== null){
			$content .= "<changefreq>" . $this->getChangeFreq()->__toString() . "</changefreq>\n";
		}
		if($this->getLastMod() !== null){
			$content .= "<lastmod>" . $this->getLastMod()->format("Y-m-dTH:i:sP") . "</lastmod>\n";
		}
		if($this->getPriority() !== null){
			if($this->getPriority() < 0.0 && $this->getPriority() > 1.0){
				throw new Exception("Priority must be in range 0.0-1.0");
			}
			$content .= "<priority>" . $this->getPriority() . "</priority>\n";
		}
		return str_replace("%{content}", $content, $base);
	}
}