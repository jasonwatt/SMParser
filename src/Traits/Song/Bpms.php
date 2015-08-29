<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

/**
 * A value of the format "beat=bpm". Indicates that at 'beat',
 * the speed of the arrows will change to "bpm". Both of these
 * values are specified as (positive) floating point values.
 * You must specifiy a BPM value for beat 0. Multiple BPMs can
 * be given by separating them with commas. e.g. "0=160,120=80".
 *
 * Class Bpms
 *
 * @package Zanson\SMParser\Traits\Song
 */
trait Bpms
{
    private $bpms = [];
    public $minBpm = 0;
    public $maxBpm = 999;

    /**
     * @return string
     */
    public function getBpms() {
        $array = [];
        foreach ($this->bpms as $key => $value) {
            $array[] = $key . '=' . $value;
        }

        return implode(',', $array);
    }

    /**
     * @param string $bpms
     *
     * @return $this
     * @throws SMException
     */
    public function setBpmsFromString($bpms) {
        if (!is_string($bpms)) {
            throw new SMException("Bpms must be a string");
        }
        $bpms = explode(',', $bpms);
        foreach ($bpms as $b) {
            $e                       = explode('=', $b);
            $this->bpms[trim($e[0])] = trim($e[1]);
        }
        $this->setBmpMinMax();

        return $this;
    }

    private function setBmpMinMax() {
        $min = null;
        $max = null;
        foreach ($this->bpms as $bpm) {
            if ($bpm < $min || $min == null) {
                $min = $bpm;
            }
            if ($bpm > $max || $max == null) {
                $max = $bpm;
            }
        }
        $this->minBpm = $min;
        $this->maxBpm = $max;
    }

    /**
     * @param float $beat
     * @param float $bpm
     *
     * @return $this
     */
    public function setBpms($beat, $bpm) {
        $this->bpms[(string)$beat] = $bpm;
        $this->setBmpMinMax();

        return $this;
    }
}