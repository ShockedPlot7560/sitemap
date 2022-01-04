<?php

declare(strict_types=1);

use ShockedPlot7560\sitemap\Sitemap;
use ShockedPlot7560\sitemap\Url;

require dirname(__DIR__) . "/vendor/autoload.php";

$sitemap = new Sitemap();
$sitemap->addUrl((new Url("https://www.google.com"))->setPriority(0.8), "google");
$sitemap->generate("sitemap.xml");