<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Titletranslit {
    private $titletranslit='';

    /**
     * @return string
     */
    public function getTitletranslit() {
        return $this->titletranslit;
    }

    /**
     * @param string $titletranslit
     *
     * @return $this
     * @throws SMException
     */
    public function setTitletranslit($titletranslit) {
        if (!is_string($titletranslit)) {
            throw new SMException("Titletranslit must be a string");
        }
        $this->titletranslit = $titletranslit;

        return $this;
    }
}