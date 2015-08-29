<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait CDImage
{
    private $CDImage = '';

    /**
     * @return string
     */
    public function getCDImage() {
        return $this->CDImage;
    }

    /**
     * @param string $CDImage
     *
     * @return $this
     * @throws SMException
     */
    public function setCDImage($CDImage) {
        if (!is_string($CDImage)) {
            throw new SMException("CDImage must be a string");
        }
        $this->CDImage = $CDImage;

        return $this;
    }
}