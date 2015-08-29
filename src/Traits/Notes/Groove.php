<?php
namespace Zanson\SMParser\Traits\Notes;

use Zanson\SMParser\SMException;

trait Groove
{
    public $groove = [0, 0, 0, 0, 0];

    /**
     * @return array
     */
    public function getGrooveArray() {
        return $this->groove;
    }

    /**
     * @return string
     */
    public function getGrooveString() {
        return implode(',', $this->groove);
    }

    /**
     * @param string /array $groove
     *
     * @return $this
     * @throws SMException
     */
    public function setGroove($groove) {
        if (is_string($groove)) {
            $groove = explode(',', $groove);
        }
        if (is_array($groove)) {
            if (count($groove) != 5) {
                throw new SMException("Groove radar must be 5 items");
            }
        } else {
            throw new SMException("Groove radar Invalid value type");
        }
        foreach ($groove as &$g) {
            $g = trim($g);
        }

        $this->groove = $groove;

        return $this;
    }
}