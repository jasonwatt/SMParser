<?php
namespace Zanson\SMParser\Model\NoteData;

use Zanson\SMParser\SMException;

class Row implements \JsonSerializable
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

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *       which is a value of any type other than a resource.
     */
    function jsonSerialize() {
        return $this->getRow();
    }
}