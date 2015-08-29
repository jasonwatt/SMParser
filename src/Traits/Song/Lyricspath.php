<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Lyricspath
{
    private $lyricspath = '';

    /**
     * @return string
     */
    public function getLyricspath() {
        return $this->lyricspath;
    }

    /**
     * @param string $lyricspath
     *
     * @return $this
     * @throws SMException
     */
    public function setLyricspath($lyricspath) {
        if (!is_string($lyricspath)) {
            throw new SMException("Lyricspath must be a string");
        }
        $this->lyricspath = $lyricspath;

        return $this;
    }
}