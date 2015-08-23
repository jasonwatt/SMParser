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
    public function newMeasure() {
        $this->measures[] = new Measure($this->type);

        return end($this->measures);
    }

    /**
     * @param mixed $noteData
     *
     * @return $this
     * @throws SMException
     */
    public function setStepsFromString($noteData) {
        if (empty($this->type)) {
            throw new SMException("Type must be set before setting note data");
        }
        $measures = explode(",", $noteData);
        foreach ($measures as $key => $val) {
            $rows = explode("\n", $val);
            $this->measures[$key] = new Measure($this->type);
            foreach ($rows as $row) {
                $row = trim($row);
                if(!empty($row)) {
                    $this->measures[$key]->addRow()->setAll($row);
                }
            }
        }

        return $this;
    }
}