<?php
namespace Zanson\SMParser\Model\SSC;


use Zanson\SMParser\Traits\Notes\ChartName;
use Zanson\SMParser\Traits\Notes\ChartStyle;
use Zanson\SMParser\Traits\Notes\Description;
use Zanson\SMParser\Traits\Notes\Difficulty;
use Zanson\SMParser\Traits\Notes\Groove;
use Zanson\SMParser\Traits\Notes\Meter;
use Zanson\SMParser\Traits\Notes\Steps;
use Zanson\SMParser\Traits\Notes\Type;
use Zanson\SMParser\Traits\Song\Attacks;
use Zanson\SMParser\Traits\Song\Credit;

/**
 * The #NOTES descriptor always takes this form:
 *
 * Class Note
 *
 * @package Zanson\SMParser\Model
 */
class Notes implements \JsonSerializable
{
    use ChartName,
        Type,
        Description,
        ChartStyle,
        Difficulty,
        Meter,
        Groove,
        Steps,
        Credit,
        Attacks;

    public function generateNote() {
        return "#NOTES:\n" .
        "   $this->type:\n" .
        "   $this->description:\n" .
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
            'ChartName'   => $this->getChartName(),
            'ChartStyle' => $this->getChartStyle(),
            'Type'        => $this->getType(),
            'Author'      => $this->getDescription(),
            'Difficulty'  => $this->getDifficulty(),
            'Meter'       => $this->getMeter(),
            'Groove'      => $this->getGrooveString(),
            'Credit'      => $this->getCredit(),
            'Attacks'     => $this->getAttacks(),
            'Steps'       => $this->getSteps()
        ];
    }
}