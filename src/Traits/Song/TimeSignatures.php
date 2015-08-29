<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait TimeSignatures
{
    private $TimeSignatures = [];

    /**
     * @return string
     */
    public function getTimeSignatures() {
        $array = [];
        foreach ($this->TimeSignatures as $key => $value) {
            $array[] = $key . '=' . $value;
        }

        return implode(',', $array);
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