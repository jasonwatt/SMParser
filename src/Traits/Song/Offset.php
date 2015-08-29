<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

/**
 * The time in seconds at which beat 0 occurs in the music.
 * This is specified as a floating point value. e.g. "2.34".
 *
 * Class Offset
 *
 * @package Zanson\SMParser\Traits\Song
 */
trait Offset
{
    private $offset = '';

    /**
     * @return string
     */
    public function getOffset() {
        return $this->offset;
    }

    /**
     * @param float $offset
     *
     * @return $this
     * @throws SMException
     */
    public function setOffset($offset) {
        if ($offset == (float)$offset) {
            $offset = (float)$offset;
        }
        if (!is_float($offset)) {
            throw new SMException("Offset must be a float");
        }
        $this->offset = $offset;

        return $this;
    }
}