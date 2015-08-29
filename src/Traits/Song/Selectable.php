<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

/**
 * If "NO", the song can not be selected manually and can only be played
 * as part of a course. If "ROULETTE", the song can can also be selected
 * via roulette. The default value is "YES".
 *
 * Class Selectable
 *
 * @package Zanson\SMParser\Traits\Song
 */
trait Selectable
{
    public $selectable = 'YES';

    /**
     * @return string
     */
    public function getSelectable() {
        return $this->selectable;
    }

    /**
     * @param string $selectable
     *
     * @return $this
     * @throws SMException
     */
    public function setSelectable($selectable) {
        if (!is_string($selectable)) {
            throw new SMException("Selectable must be a string");
        }
        $selectable = strtoupper($selectable);
        if ($selectable != 'NO' && $selectable != 'YES' && $selectable != 'ROULETTE') {
            throw new SMException("Selectable must be YES, ROULETTE or NO");
        }
        $this->selectable = $selectable;

        return $this;
    }
}