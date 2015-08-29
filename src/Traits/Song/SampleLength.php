<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

/**
 * The time in seconds let the sample music play after starting.
 * This is specified as a floating point value. e.g. "16.00".
 * Note that in the last 1 second of playing the music will fade out.
 *
 * Class Samplelength
 *
 * @package Zanson\SMParser\Traits\Song
 */
trait SampleLength
{
    public $sampleLength = '';

    /**
     * @return string
     */
    public function getSampleLength() {
        return $this->sampleLength;
    }

    /**
     * @param float $sampleLength
     *
     * @return $this
     * @throws SMException
     */
    public function setSampleLength($sampleLength) {
        if ($sampleLength == (float)$sampleLength) {
            $sampleLength = (float)$sampleLength;
        }
        if (!is_float($sampleLength)) {
            throw new SMException("Samplelength must be a float");
        }
        $this->sampleLength = $sampleLength;

        return $this;
    }
}