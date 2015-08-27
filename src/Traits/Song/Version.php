<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Version {
    private $version='';

    /**
     * @return string
     */
    public function getVersion() {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return $this
     * @throws SMException
     */
    public function setVersion($version) {
        if (!is_string($version)) {
            throw new SMException("Artist must be a string");
        }
        $this->version = $version;

        return $this;
    }
}