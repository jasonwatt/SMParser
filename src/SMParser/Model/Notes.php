<?php
/**
 * Created by PhpStorm.
 * User: z
 * Date: 8/23/2015
 * Time: 1:16 AM
 */

namespace Zanson\SMParser\Model;


use Zanson\SMParser\Traits\Notes\Author;
use Zanson\SMParser\Traits\Notes\Difficulty;
use Zanson\SMParser\Traits\Notes\Groove;
use Zanson\SMParser\Traits\Notes\Meter;
use Zanson\SMParser\Traits\Notes\Steps;
use Zanson\SMParser\Traits\Notes\Type;

/**
 * The #NOTES descriptor always takes this form:
 * NotesType:
 * Description:
 * DifficultyClass:
 * DifficultyMeter:
 * RadarValues:
 * NoteData:
 *
 * Class Note
 *
 * @package Zanson\SMParser\Model
 */
class Notes
{
    use Type, Author, Difficulty, Meter, Groove, Steps;

    public function generateNote() {
        return "#NOTES:\n" .
        "   $this->type:\n" .
        "   $this->author:\n" .
        "   $this->difficulty:\n" .
        "   $this->meter:\n" .
        "   " . $this->getGrooveString() . ":\n" .
        $this->getNoteData() . "\n;";
    }
}