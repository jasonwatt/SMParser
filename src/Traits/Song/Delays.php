<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Delays
{
    private $Delays = [];

    /**
     * @return string
     */
    public function getDelays() {
        $array = [];
        foreach ($this->Delays as $key => $value) {
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
    public function setDelaysFromString($string) {
        if (!is_string($string)) {
            throw new SMException("Bpms must be a string");
        }
        $string = explode(',', $string);
        foreach ($string as $b) {
            $e                  = explode('=', $b);
            $this->Delays[trim($e[0])] = trim($e[1]);
        }

        return $this;
    }

    /**
     * @param $startTime
     * @param $length
     *
     * @return $this
     */
    public function setDelays($startTime, $length) {
        $this->Delays[(string)$startTime] = $length;

        return $this;
    }
}