<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait TimsSignatures
{
    public $TimsSignatures = [];

    /**
     * @return string
     */
    public function getTimsSignatures() {
        $array = [];
        foreach ($this->TimsSignatures as $key => $value) {
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
    public function setTimsSignaturesFromString($TimsSignatures) {
        if (!is_string($TimsSignatures)) {
            throw new SMException("TimsSignatures must be a string");
        }
        $TimsSignatures = explode(',', $TimsSignatures);
        foreach ($TimsSignatures as $b) {
            $this->TimsSignatures[] = trim($b);
        }

        return $this;
    }
}