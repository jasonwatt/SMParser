<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Labels
{
    public $Labels = [];

    /**
     * @return string
     */
    public function getLabels() {
        $array = [];
        foreach ($this->Labels as $key => $value) {
            $array[] = $key . '=' . $value;
        }

        return implode(',', $array);
    }

    /**
     * @param string $time
     * @param string $label
     *
     * @return $this
     * @throws SMException
     */
    public function setLabel($time, $label) {
        if (!is_string($label)) {
            throw new SMException("Labels must be a string");
        }
        $this->Labels[(string)$time] = $label;

        return $this;
    }

    /**
     * @param $labels
     *
     * @return $this
     * @throws SMException
     */
    public function setLabelsFromString($labels) {
        if (!is_string($labels)) {
            throw new SMException("Labels must be a string");
        }
        $labels = explode(',', $labels);
        foreach ($labels as $b) {
            $e                         = explode('=', $b);
            $this->Labels[trim($e[0])] = trim($e[1]);
        }

        return $this;
    }
}