<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

/**
 * The time in seconds to start the music sample that plays on
 * the Select Music screen. This is specified as a
 * floating point value. e.g. "32.34".
 *
 * Class SampleStart
 *
 * @package Zanson\SMParser\Traits\Song
 */
trait SampleStart
{
    private $sampleStart = '';

    /**
     * @return string
     */
    public function getSampleStart() {
        return $this->sampleStart;
    }

    /**
     * @param float $sampleStart
     *
     * @return $this
     * @throws SMException
     */
    public function setSampleStart($sampleStart) {
        if($sampleStart == (float)$sampleStart){
            $sampleStart = (float)$sampleStart;
        }
        if (!is_float($sampleStart)) {
            throw new SMException("SampleStart must be a float");
        }
        $this->sampleStart = $sampleStart;

        return $this;
    }
}