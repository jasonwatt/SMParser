<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Warps
{
    private $Warps = [];

    /**
     * @return string
     */
    public function getWarps() {
        $array = [];
        foreach ($this->Warps as $key => $value) {
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
    public function setWarpsFromString($string) {
        if (!is_string($string)) {
            throw new SMException("Bpms must be a string");
        }
        $string = explode(',', $string);
        foreach ($string as $b) {
            $e                  = explode('=', $b);
            $this->Warps[trim($e[0])] = trim($e[1]);
        }

        return $this;
    }

    /**
     * @param $startTime
     * @param $length
     *
     * @return $this
     *
     */
    public function setWarps($startTime, $length) {
        $this->Warps[(string)$startTime] = $length;

        return $this;
    }
}