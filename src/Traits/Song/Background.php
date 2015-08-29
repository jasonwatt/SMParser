<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Background
{
    private $background = '';

    /**
     * @return string
     */
    public function getBackground() {
        return $this->background;
    }

    /**
     * @param string $background
     *
     * @return $this
     * @throws SMException
     */
    public function setBackground($background) {
        if (!is_string($background)) {
            throw new SMException("Background must be a string");
        }
        $this->background = $background;

        return $this;
    }
}