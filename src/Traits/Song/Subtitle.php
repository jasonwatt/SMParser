<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

/**
 * This text will appear underneath the main title of the
 * song on the Select Music screen. e.g. "~Dirty Mix~" or "(remix)".
 *
 * Class Subtitle
 *
 * @package Zanson\SMParser\Traits\Song
 */
trait Subtitle
{
    public $subtitle = '';

    /**
     * @return string
     */
    public function getSubtitle() {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     *
     * @return $this
     * @throws SMException
     */
    public function setSubtitle($subtitle) {
        if (!is_string($subtitle)) {
            throw new SMException("Subtitle must be a string");
        }
        $this->subtitle = $subtitle;

        return $this;
    }
}