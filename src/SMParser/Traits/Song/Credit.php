<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Credit {
    private $credit='';

    /**
     * @return string
     */
    public function getCredit() {
        return $this->credit;
    }

    /**
     * @param string $credit
     *
     * @return $this
     * @throws SMException
     */
    public function setCredit($credit) {
        if (!is_string($credit)) {
            throw new SMException("Credit must be a string");
        }
        $this->credit = $credit;

        return $this;
    }
}