<?php

namespace Zanson\SMParser\Model\NoteData;


class DanceSoloRow extends Row
{
    public $row = [0, 0, 0, 0, 0, 0];

    public function setLeft($note) {
        $this->row[1] = Note::addByTypeId($note);

        return $this;
    }

    public function setDown($note) {
        $this->row[2] = Note::addByTypeId($note);

        return $this;
    }

    public function setUp($note) {
        $this->row[3] = Note::addByTypeId($note);

        return $this;
    }

    public function setRight($note) {
        $this->row[4] = Note::addByTypeId($note);

        return $this;
    }

    public function setUpLeft($note) {
        $this->row[0] = Note::addByTypeId($note);

        return $this;
    }

    public function setUpRight($note) {
        $this->row[5] = Note::addByTypeId($note);

        return $this;
    }
}