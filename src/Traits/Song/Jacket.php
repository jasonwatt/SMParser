<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Jaclet {
    private $jacket='';

    /**
     * @return string
     */
    public function getJacket() {
        return $this->jacket;
    }

    /**
     * @param string $jacket
     *
     * @return $this
     * @throws SMException
     */
    public function setJacket($jacket) {
        if (!is_string($jacket)) {
            throw new SMException("Jacket must be a string");
        }
        $this->jacket = $jacket;

        return $this;
    }
}