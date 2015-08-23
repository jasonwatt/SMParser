<?php
namespace Zanson\SMParser\Traits\Notes;

use Zanson\SMParser\Config;
use Zanson\SMParser\SMException;

trait Difficulty
{
    private $difficulty = '';

    /**
     * @return string
     */
    public function getDifficulty() {
        return $this->difficulty;
    }

    /**
     * @param string $difficulty
     *
     * @return $this
     * @throws SMException
     */
    public function setDifficulty($difficulty) {
        if (!is_string($difficulty)) {
            throw new SMException("Difficulty must be a string");
        }
        $difficulty = ucfirst(strtolower(trim($difficulty)));
        if (!in_array($difficulty, Config::$difficultiesList)) {
            throw new SMException("Difficulty was not found in list. Only accepts: " . implode(',', Config::$difficultiesList));
        }
        $this->difficulty = trim($difficulty);

        return $this;
    }
}