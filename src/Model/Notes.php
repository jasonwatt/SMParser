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
class Notes implements \JsonSerializable
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

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *       which is a value of any type other than a resource.
     */
    function jsonSerialize() {
        return [
            'Type'       => $this->getType(),
            'Author'     => $this->getAuthor(),
            'Difficulty' => $this->getDifficulty(),
            'Meter'      => $this->getMeter(),
            'Groove'     => $this->getGrooveString(),
            'Steps'      => $this->getSteps(),
        ];
    }
}