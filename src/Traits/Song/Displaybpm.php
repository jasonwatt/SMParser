<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Displaybpm
{
    private $displaybpm = '';

    /**
     * @return string
     */
    public function getDisplaybpm() {
        return $this->displaybpm;
    }

    /**
     * @param int $min
     * @param int $max
     *
     * @return $this
     * @throws SMException
     *
     */
    public function setDisplaybpm($min = 0, $max = null) {
        if (is_string($min) && $min != '*') {
            throw new SMException("Display BPM Min must be a number or *");
        }

        if (!is_numeric($min) || (!is_null($max) && !is_numeric($max))) {
            throw new SMException("Display BPM Min and Max must be a number or *");
        }

        if (is_string($min)) {
            $this->displaybpm = '*';
        } else if (is_numeric($max)) {
            $this->displaybpm = $min . '-' . $max;
        } else {
            $this->displaybpm = $min;
        }

        return $this;
    }
}