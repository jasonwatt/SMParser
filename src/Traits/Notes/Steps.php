<?php
namespace Zanson\SMParser\Traits\Notes;

use Zanson\SMParser\Model\NoteData\Measure;
use Zanson\SMParser\SMException;

trait Steps
{
    public $measures = [];

    /**
     * @return mixed
     */
    public function getSteps() {
        //return $this->noteData;
    }

    /**
     * @return Measure
     */
    public function newMeasure($key=null) {
        if(is_null($key)) {
            $this->measures[] = new Measure($this->type);
        } else {
            $this->measures[$key] = new Measure($this->type);
        }

        return end($this->measures);
    }
}