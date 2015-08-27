<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Scrolls {
    private $Scrolls=[];
    
    /**
     * @return string
     */
    public function getScrolls() {
        $array = [];
        foreach ($this->Scrolls as $key => $value) {
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
    public function setScrolls($startTime, $length) {
        $this->Scrolls[(string)$startTime] = $length;

        return $this;
    }

    /**
     * @param $scrolls
     *
     * @return $this
     * @throws SMException
     */
    public function setScrollsFromString($scrolls) {
        if (!is_string($scrolls)) {
            throw new SMException("Scrolls must be a string");
        }
        $scrolls = explode(',', $scrolls);
        foreach ($scrolls as $b) {
            $e                 = explode('=', $b);
            $this->Scrolls[trim($e[0])] = trim($e[1]);
        }

        return $this;
    }
}