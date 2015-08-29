<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Music
{
    public $music = '';

    /**
     * @return string
     */
    public function getMusic() {
        return $this->music;
    }

    /**
     * @param string $music
     *
     * @return $this
     * @throws SMException
     */
    public function setMusic($music) {
        if (!is_string($music)) {
            throw new SMException("Music must be a string");
        }
        $this->music = $music;

        return $this;
    }
}