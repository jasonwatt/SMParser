<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait PreviewVid
{
    public $previewVid = '';

    /**
     * @return string
     */
    public function getPreviewVid() {
        return $this->previewVid;
    }

    /**
     * @param string $previewVid
     *
     * @return $this
     * @throws SMException
     */
    public function setPreviewVid($previewVid) {
        if (!is_string($previewVid)) {
            throw new SMException("PreviewVid must be a string");
        }
        $this->previewVid = $previewVid;

        return $this;
    }
}