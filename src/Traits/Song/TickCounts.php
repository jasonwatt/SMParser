<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait TickCounts
{
    private $TickCounts = [];

    /**
     * @return string
     */
    public function getTickCounts() {
        $array = [];
        foreach ($this->TickCounts as $key => $value) {
            $array[] = $key . '=' . $value;
        }

        return implode(',', $array);
    }

    /**
     * @param string  $startTime
     * @param integer $count
     *
     * @return $this
     * @internal param string $length
     *
     */
    public function setTickCounts($startTime, $count) {
        $this->TickCounts[(string)$startTime] = $count;

        return $this;
    }

    /**
     * @param $TickCounts
     *
     * @return $this
     * @throws SMException
     */
    public function setTickCountsFromString($TickCounts) {
        if (!is_string($TickCounts)) {
            throw new SMException("TickCounts must be a string");
        }
        $TickCounts = explode(',', $TickCounts);
        foreach ($TickCounts as $b) {
            $e                             = explode('=', $b);
            $this->TickCounts[trim($e[0])] = trim($e[1]);
        }

        return $this;
    }
}