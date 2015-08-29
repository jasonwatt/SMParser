<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait TimeSignatures
{
    public $TimeSignatures = [];

    /**
     * @return string
     */
    public function getTimeSignatures() {
        return implode(',', $this->TimeSignatures);
    }

    /**
     * @param $TimsSignatures
     *
     * @return $this
     * @throws SMException
     */
    public function setTimeSignaturesFromString($TimsSignatures) {
        if (!is_string($TimsSignatures)) {
            throw new SMException("TimsSignatures must be a string");
        }
        $TimsSignatures = explode(',', $TimsSignatures);
        foreach ($TimsSignatures as $b) {
            $this->TimeSignatures[] = trim($b);
        }

        return $this;
    }
}