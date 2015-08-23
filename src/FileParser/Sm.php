<?php
namespace Zanson\SMParser\FileParser;

use Zanson\SMParser\Model\Song;
use Zanson\SMParser\SMException;

class Sm
{
    public $song;

    /**
     * Parses SM files to the SM song model
     *
     * @param $filePath
     *
     * @throws SMException
     */
    function parse($filePath) {
        $filestring = file_get_contents($filePath);
        $this->song = new Song();
        $fs         = preg_replace(array("/\/\/.*\n/", "/^\s*[\r\n][\r\n]?/m"), array("\n", ""), $filestring);
        $filearray  = explode(";", $fs);
        foreach ($filearray as $s) {
            $data = explode(":", trim($s));
            switch ($data[0]) {
                case '#NOTES':
                    $this->song->newNoteSet()
                        ->setType($data[1])
                        ->setAuthor($data[2])
                        ->setDifficulty($data[3])
                        ->setMeter($data[4])
                        ->setGroove($data[5])
                        ->setStepsFromString($data[6]);
                    break;
                default:
                    if(empty($data[0])){
                        break;
                    }
                    $data[0] = str_replace('#','',$data[0]);
                    if(empty($this->song->fileTagNameToFunction[$data[0]])){
                        throw new SMException('Method '. $data[0].' Not found');
                        break;
                    }
                    $method = 'set'.$this->song->fileTagNameToFunction[$data[0]];
                    $this->song->{$method}($data[1]);
                    break;
            }
        }
    }
}

?>
