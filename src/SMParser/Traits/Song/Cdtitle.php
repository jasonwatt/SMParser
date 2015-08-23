<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Cdtitle {
    private $cdtitle='';

    /**
     * @return string
     */
    public function getCdtitle() {
        return $this->cdtitle;
    }

    /**
     * @param string $cdtitle
     *
     * @return $this
     * @throws SMException
     */
    public function setCdtitle($cdtitle) {
        if (!is_string($cdtitle)) {
            throw new SMException("Cdtitle must be a string");
        }
        $this->cdtitle = $cdtitle;

        return $this;
    }
}