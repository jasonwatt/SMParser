<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

/**
 * A value of the format "beat=sec". Indicates that at 'beat',
 * the motion of the arrows should stop for "sec" seconds.
 * Both of these values are specified as floating point values.
 * Multiple stops can be given by separating them with commas.
 * e.g. "60=2.23,80=1.12".
 *
 * Class Bpms
 *
 * @package Zanson\SMParser\Traits\Song
 */
trait KeySounds
{
    private $keysounds = [];

    /**
     * @return string
     */
    public function getKeysounds() {
        return $this->keysounds;
    }

    /**
     * @param array $keysounds
     *
     * @return $this
     */
    public function setKeysounds($keysounds) {
        $this->keysounds = $keysounds;

        return $this;
    }
}