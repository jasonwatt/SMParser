<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Banner
{
    public $banner = '';

    /**
     * @return string
     */
    public function getBanner() {
        return $this->banner;
    }

    /**
     * @param string $banner
     *
     * @return $this
     * @throws SMException
     */
    public function setBanner($banner) {
        if (!is_string($banner)) {
            throw new SMException("Banner must be a string");
        }
        $this->banner = $banner;

        return $this;
    }
}