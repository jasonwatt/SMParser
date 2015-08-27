<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Fakes {
    private $Fakes=[];
    
    /**
     * @return string
     */
    public function getFakes() {
        $array = [];
        foreach ($this->Fakes as $key => $value) {
            $array[] = $key . '=' . $value;
        }

        return implode(',', $array);
    }

    /**
     * @param string $startTime
     * @param string $length
     *
     * @return $this
     * @throws SMException
     */
    public function setFakes($startTime, $length) {
        $this->Fakes[(string)$startTime] = $length;

        return $this;
    }

    /**
     * @param $fakes
     *
     * @return $this
     * @throws SMException
     */
    public function setFakesFromString($fakes) {
        if (!is_string($fakes)) {
            throw new SMException("Fakes must be a string");
        }
        $fakes = explode(',', $fakes);
        foreach ($fakes as $b) {
            $e                 = explode('=', $b);
            $this->Fakes[trim($e[0])] = trim($e[1]);
        }

        return $this;
    }
}