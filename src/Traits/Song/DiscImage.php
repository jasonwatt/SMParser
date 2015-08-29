<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait DiscImage
{
    public $DiscImage = '';

    /**
     * @return string
     */
    public function getDiscImage() {
        return $this->DiscImage;
    }

    /**
     * @param string $DiscImage
     *
     * @return $this
     * @throws SMException
     */
    public function setDiscImage($DiscImage) {
        if (!is_string($DiscImage)) {
            throw new SMException("DiscImage must be a string");
        }
        $this->DiscImage = $DiscImage;

        return $this;
    }
}