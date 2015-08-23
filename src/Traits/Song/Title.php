<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Title {
    private $title='';

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     * @throws SMException
     */
    public function setTitle($title) {
        if (!is_string($title)) {
            throw new SMException("Title must be a string");
        }
        $this->title = $title;

        return $this;
    }
}