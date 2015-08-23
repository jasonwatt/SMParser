<?php

namespace Zanson\SMParser\Model\NoteData;


class DanceDoubleRow extends Row
{
    public $row = [0, 0, 0, 0, 0, 0, 0, 0];

    public function setP1Left($note) {
        $this->row[0] = Note::addByTypeId($note);

        return $this;
    }

    public function setP1Down($note) {
        $this->row[1] = Note::addByTypeId($note);

        return $this;
    }

    public function setP1Up($note) {
        $this->row[2] = Note::addByTypeId($note);

        return $this;
    }

    public function setP1Right($note) {
        $this->row[3] = Note::addByTypeId($note);

        return $this;
    }

    public function setP2Left($note) {
        $this->row[4] = Note::addByTypeId($note);

        return $this;
    }

    public function setP2Down($note) {
        $this->row[5] = Note::addByTypeId($note);

        return $this;
    }

    public function setP2Up($note) {
        $this->row[6] = Note::addByTypeId($note);

        return $this;
    }

    public function setP2Right($note) {
        $this->row[7] = Note::addByTypeId($note);

        return $this;
    }
}