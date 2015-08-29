<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait ArtistTranslit
{
    private $artistTranslit = '';

    /**
     * @return string
     */
    public function getArtistTranslit() {
        return $this->artistTranslit;
    }

    /**
     * @param string $artistTranslit
     *
     * @return $this
     * @throws SMException
     */
    public function setArtistTranslit($artistTranslit) {
        if (!is_string($artistTranslit)) {
            throw new SMException("Artisttranslit must be a string");
        }
        $this->artistTranslit = $artistTranslit;

        return $this;
    }
}