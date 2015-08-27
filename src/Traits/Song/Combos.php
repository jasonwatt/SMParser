<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Combos {
    private $Combos='';
    
    /**
     * @return string
     */
    public function getCombos() {
        return $this->Combos;
    }

    /**
     * @param string $Combos
     *
     * @return $this
     * @throws SMException
     */
    public function setCombos($Combos) {
        if (!is_string($Combos)) {
            throw new SMException("Combos must be a string");
        }
        $this->Combos = $Combos;

        return $this;
    }
}