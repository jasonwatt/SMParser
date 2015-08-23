<?php
namespace Zanson\SMParser\Model\NoteData;

use Zanson\SMParser\SMException;

class Note
{
    const LIFT = 'L';
    const MINE = 'M';
    const NONE = 0;
    const REGULAR = 1;
    const START_HOLD = 2;
    const END_HOLD = 3;
    const START_ROLL = 4;
    const END_ROLL = 3;
    public static $types = [0, 1, 2, 3, 4, 'L', 'M'];

    public static function addByTypeId($id) {
        if (!in_array($id, self::$types)) {
            throw new SMException('Not type dosn\'t exist');
        }

        return $id;
    }
}