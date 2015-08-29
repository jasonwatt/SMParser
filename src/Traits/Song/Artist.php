<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Artist
{
    private $artist = '';

    /**
     * @return string
     */
    public function getArtist() {
        return $this->artist;
    }

    /**
     * @param string $artist
     *
     * @return $this
     * @throws SMException
     */
    public function setArtist($artist) {
        if (!is_string($artist)) {
            throw new SMException("Artist must be a string");
        }
        $this->artist = $artist;

        return $this;
    }
}