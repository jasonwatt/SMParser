<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait SubtitleTranslit
{
    public $subtitleTranslit = '';

    /**
     * @return string
     */
    public function getSubtitleTranslit() {
        return $this->subtitleTranslit;
    }

    /**
     * @param string $subtitleTranslit
     *
     * @return $this
     * @throws SMException
     */
    public function setSubtitleTranslit($subtitleTranslit) {
        if (!is_string($subtitleTranslit)) {
            throw new SMException("Subtitle Translit must be a string");
        }
        $this->subtitleTranslit = $subtitleTranslit;

        return $this;
    }
}