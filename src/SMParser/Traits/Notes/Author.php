<?php
namespace Zanson\SMParser\Traits\Notes;

use Zanson\SMParser\SMException;

trait Author
{
    private $author = '';

    /**
     * @return string
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * @param string $author
     *
     * @return $this
     * @throws SMException
     */
    public function setAuthor($author) {
        if (!is_string($author)) {
            throw new SMException("Author must be a string");
        }
        $this->author = trim($author);

        return $this;
    }


}