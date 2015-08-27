<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Preview {
    private $preview='';

    /**
     * @return string
     */
    public function getPreview() {
        return $this->preview;
    }

    /**
     * @param string $preview
     *
     * @return $this
     * @throws SMException
     */
    public function setPreview($preview) {
        if (!is_string($preview)) {
            throw new SMException("Preview must be a string");
        }
        $this->preview = $preview;

        return $this;
    }
}