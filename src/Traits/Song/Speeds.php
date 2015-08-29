<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

trait Speeds
{
    public $Speeds = [];

    /**
     * @return string
     */
    public function getSpeeds() {
        $array = [];
        foreach ($this->Speeds as $key => $value) {
            $array[] = $key . '=' . $value;
        }

        return implode(',', $array);
    }

    /**
     * @param $speeds
     *
     * @return $this
     * @throws SMException
     */
    public function setSpeedsFromString($speeds) {
        if (!is_string($speeds)) {
            throw new SMException("Speeds must be a string");
        }
        $speeds = explode(',', $speeds);
        foreach ($speeds as $b) {
            $this->Speeds[] = trim($b);
        }

        return $this;
    }
}