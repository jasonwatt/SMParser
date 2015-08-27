<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

/**
 * A value of the format "beat=sec". Indicates that at 'beat',
 * the motion of the arrows should stop for "sec" seconds.
 * Both of these values are specified as floating point values.
 * Multiple stops can be given by separating them with commas.
 * e.g. "60=2.23,80=1.12".
 *
 * Class Bpms
 *
 * @package Zanson\SMParser\Traits\Song
 */
trait Stops
{
    private $stops = [];

    /**
     * @return string
     */
    public function getStops() {
        $array = [];
        foreach ($this->stops as $key => $value) {
            $array[] = $key . '=' . $value;
        }

        return implode(',', $array);
    }

    /**
     * @param string $string
     *
     * @return $this
     * @throws SMException
     */
    public function setStopsFromString($string) {
        if (!is_string($string)) {
            throw new SMException("Bpms must be a string");
        }
        $string = explode(',', $string);
        foreach ($string as $b) {
            $e                  = explode('=', $b);
            $this->stops[trim($e[0])] = trim($e[1]);
        }

        return $this;
    }

    /**
     * @param float $beat
     * @param float $bpm
     *
     * @return $this
     */
    public function setStops($startTime, $length) {
        $this->stops[(string)$startTime] = $length;

        return $this;
    }
}