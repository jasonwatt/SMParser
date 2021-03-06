<?php
namespace Zanson\SMParser\Model\NoteData;


use Zanson\SMParser\SMException;

class Measure
{
    private $type = '';
    public $rows = [];

    public function __construct($type) {
        $this->type = $type;
    }

    /**
     * @return DanceSingleRow
     * @throws SMException
     */
    public function addRow() {
        if ($this->type == 'dance-single') {
            $this->rows[] = new DanceSingleRow();
        } else if ($this->type == 'dance-double') {
            $this->rows[] = new DanceDoubleRow();
        } else if ($this->type == 'dance-solo') {
            $this->rows[] = new DanceSoloRow();
        } else {
            throw new SMException('Type currently not supported');
        }

        return end($this->rows);
    }
}