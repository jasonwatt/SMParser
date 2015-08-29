<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Origin
{
    private $origin = '';

    /**
     * @return string
     */
    public function getOrigin() {
        return $this->origin;
    }

    /**
     * @param string $origin
     *
     * @return $this
     * @throws SMException
     */
    public function setOrigin($origin) {
        if (!is_string($origin)) {
            throw new SMException("Origin must be a string");
        }
        $this->origin = $origin;

        return $this;
    }
}