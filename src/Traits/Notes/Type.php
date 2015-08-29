<?php
namespace Zanson\SMParser\Traits\Notes;

use Zanson\SMParser\Config;
use Zanson\SMParser\SMException;

/**
 * Notes that are hit at the same time are grouped into rows. For example, if the NotesType is "dance-single", the row "1001" would specify that both the Left and Right panels should be hit at the same time.
 *
 * The number of notes per row (also called the number of 'columns') depends on the "NotesType".
 * dance-single = 4 notes/row (Left,Down,Up,Right)
 * dance-double = 8 notes/row
 * dance-couple = 8 notes/row
 * dance-solo = 6 notes/row
 * pump-single = 5 notes/row
 * pump-double = 10 notes/row
 * pump-couple = 10 notes/row
 * ez2-single = 5 notes/row
 * ez2-double = 10 notes/row
 * ez2-real = 7 notes/row
 * para-single = 5 notes/row
 *
 * Note rows are grouped into measures. The number of note rows you specify in a measure will determine the time value of each note. For example, if there are 4 note rows in a measure, each note will be treated as a quarter note. If there are 8 notes rows in a measure, each note will be treated as a eighth note. If there are 12 notes rows in a measure, each note will be treated as a triplet (1/12th) note. Measures are separated by a comma.
 *
 * Class Type
 *
 * @package Zanson\SMParser\Traits\Notes
 */
trait Type
{
    public $type = '';


    /**
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     * @throws SMException
     */
    public function setType($type) {
        if (!is_string($type)) {
            throw new SMException("Type must be a string");
        }
        $type = trim($type);
        if (!array_key_exists(strtolower($type), Config::$typesList)) {
            throw new SMException("Invalid Type");
        }
        $this->type = trim($type);

        return $this;
    }
}