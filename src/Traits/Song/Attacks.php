<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Attacks
{
    public $Attacks = '';

    /**
     * @return string
     */
    public function getAttacks() {
        return $this->Attacks;
    }

    /**
     * @param string $Attacks
     *
     * @return $this
     * @throws SMException
     */
    public function setAttacks($Attacks) {
        if (!is_string($Attacks)) {
            throw new SMException("Attacks must be a string");
        }
        $this->Attacks = trim($Attacks);

        return $this;
    }
}