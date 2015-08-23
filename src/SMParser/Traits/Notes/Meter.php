<?php
namespace Zanson\SMParser\Traits\Notes;

use Zanson\SMParser\SMException;

trait Meter
{
    private $meter = 0;

    /**
     * @return integer
     */
    public function getMeter() {
        return $this->meter;
    }

    /**
     * @param integer $meter
     *
     * @return $this
     * @throws SMException
     */
    public function setMeter($meter) {
        if (!is_numeric($meter)) {
            throw new SMException("Meter must be a number");
        }
        $this->meter = (int)trim($meter);

        return $this;
    }
}