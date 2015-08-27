<?php
namespace Zanson\SMParser\Traits\Notes;

use Zanson\SMParser\SMException;

trait Description
{
    private $description = '';

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     * @throws SMException
     */
    public function setDescription($description) {
        if (!is_string($description)) {
            throw new SMException("Description must be a string");
        }
        $this->description = trim($description);

        return $this;
    }


}