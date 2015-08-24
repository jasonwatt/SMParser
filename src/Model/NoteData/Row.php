<?php
namespace Zanson\SMParser\Model\NoteData;

use Zanson\SMParser\SMException;

class Row
{
    public $row;

    /**
     * @param string $row
     *
     * @return $this
     * @throws \Zanson\SMParser\SMException
     */
    public function setAll($row) {
        if (is_string($row)) {
            $row = str_split(trim($row));
        }
        if (count($row) != count($this->row)) {
            throw new SMException("Length must be " . count($this->row));
        }
        foreach ($row as &$val) {
            $val = Note::addByTypeId($val);
        }
        $this->row = $row;

        return $this;
    }

    public function getRow() {
        return implode('', $this->row);
    }
}