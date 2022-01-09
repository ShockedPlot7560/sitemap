<?php

declare(strict_types=1);

namespace ShockedPlot7560\sitemap;

use function array_push;
use function file_put_contents;
use function str_replace;

class Sitemap{

	/** @var Url[] */
	private array $urls = [];

	public function addUrl(Url $url, string $slug) : void{
		array_push($this->urls, $url);
	}

	public function removeUrl(string $slug) : void{
		unset($this->urls[$slug]);
	}

	/** @return Url[] */
	public function getUrls() : array{
		return $this->urls;
	}

	public function encodeToXml() : string{
		$base = "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n{content}</urlset>";
		$content = "";
		foreach ($this->getUrls() as $url) {
			$content .= $url->convertToXml();
		}
		return str_replace("{content}", $content, $base);
	}

	public function generate(string $path) : void{
		file_put_contents($path, $this->encodeToXml());
	}

}
