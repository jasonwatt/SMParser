<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Genre
{
    public $genre = '';

    /**
     * @return string
     */
    public function getGenre() {
        return $this->genre;
    }

    /**
     * @param string $genre
     *
     * @return $this
     * @throws SMException
     */
    public function setGenre($genre) {
        if (!is_string($genre)) {
            throw new SMException("Genre must be a string");
        }
        $this->genre = $genre;

        return $this;
    }
}