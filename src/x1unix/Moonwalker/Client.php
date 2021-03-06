<?php
namespace x1unix\Moonwalker;


use x1unix\Moonwalker\Exceptions\MoonwalkerException;
use x1unix\Moonwalker\Exceptions\MoonwalkerNotFoundException;

class Client
{
    private $hostname = '';
    public function __construct($hostname)
    {
        $this->hostname = $hostname;
    }

    public function getMovieByKinopoiskId($kpId) {
        $frame = $this->getFrameUrl($kpId);
        return $frame;
    }

    private function getFrameUrl($kpId) {
        $script = Grabber::getPlayerScriptByKinopoiskId($kpId);
        $path = Parser::getFrameUrlFromScript($script);

        unset($script);
        return $path;
    }
}