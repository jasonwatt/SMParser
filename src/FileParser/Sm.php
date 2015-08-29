<?php
namespace Zanson\SMParser\FileParser;

use Zanson\DebugHelper\Output;
use Zanson\SMParser\Model\SM\Song;
use Zanson\SMParser\SMNotImplemented;

class Sm extends FileParserAbstract implements FileParserInterface
{
    protected $fileExtension = 'sm';

    public $fileTagNameToFunction = [
        'TITLE'            => 'Title',
        'SUBTITLE'         => 'Subtitle',
        'ARTIST'           => 'Artist',
        'TITLETRANSLIT'    => 'Titletranslit',
        'SUBTITLETRANSLIT' => 'SubtitleTranslit',
        'ARTISTTRANSLIT'   => 'ArtistTranslit',
        'GENRE'            => 'Genre',
        'CREDIT'           => 'Credit',
        'BANNER'           => 'Banner',
        'BACKGROUND'       => 'Background',
        'LYRICSPATH'       => 'Lyricspath',
        'CDTITLE'          => 'Cdtitle',
        'MUSIC'            => 'Music',
        'OFFSET'           => 'Offset',
        'SAMPLESTART'      => 'SampleStart',
        'SAMPLELENGTH'     => 'SampleLength',
        'SELECTABLE'       => 'Selectable',
        'BPMS'             => 'BpmsFromString',
        'DISPLAYBPM'       => 'Displaybpm',
        'STOPS'            => 'StopsFromString',
        'BGCHANGES'        => 'BGChanges',
        'FGCHANGES'        => 'FGChanges'
    ];

    /**
     * Parses SM files to the SM song model
     *
     * @param string $fileContents Pass in the contents of the file
     *
     * @return null|void
     * @throws SMNotImplemented
     * @throws \Zanson\SMParser\SMException
     */
    function parse($fileContents) {
        $this->song = new Song();
        $fs         = preg_replace(array("/\/\/.*\n/", "/^\s*[\r\n][\r\n]?/m"), array("\n", ""), $fileContents);
        $filearray  = explode(";", $fs);
        foreach ($filearray as $s) {
            $data = explode(":", trim($s));
            switch ($data[0]) {
                case '#NOTES':
                    $noteSet = $this->song->newNoteSet();
                    $noteSet->setType($data[1])
                        ->setDescription($data[2])
                        ->setDifficulty($data[3])
                        ->setMeter($data[4])
                        ->setGroove($data[5]);

                    $measures = explode(",", $data[6]);
                    foreach ($measures as $key => $val) {
                        $rows       = explode("\n", $val);
                        $newMeasure = $noteSet->newMeasure($key);
                        foreach ($rows as $row) {
                            $row = trim($row);
                            if (!empty($row)) {
                                $newMeasure->addRow()->setAll($row);
                            }
                        }
                    }

                    break;
                default:
                    if (empty($data[0])) {
                        break;
                    }
                    $data[0] = str_replace('#', '', $data[0]);
                    if (empty($this->fileTagNameToFunction[$data[0]])) {
                        throw new SMNotImplemented('Method for ' . $data[0] . ' Not found');
                        break;
                    }
                    $method = 'set' . $this->fileTagNameToFunction[$data[0]];
                    $this->song->{$method}($data[1]);
                    break;
            }
        }
    }

    /**
     * Exports the content of a file to be saved
     *
     * @return string
     */
    public function export() {
        $file = '';
        foreach ($this->fileTagNameToFunction as $tag => $function) {
            $function = str_replace('FromString', '', $function);
            $tag      = strtoupper($tag);
            $function = 'get' . $function;
            if (method_exists($this->song, $function)) {
                $value = $this->song->{$function}();
                $file .= "#$tag:$value;\n";
            } else {
                Output::log('No Method', $function);
            }
        }

        foreach ($this->song->notes as $key => $value) {
            $file .=
                "\n//---------------{$value->getType()} - {$value->getDifficulty()} ----------------\n" .
                "#NOTES:\n" .
                "     {$value->getType()}:\n" .
                "     {$value->getDescription()}:\n" .
                "     {$value->getDifficulty()}:\n" .
                "     {$value->getMeter()}:\n" .
                "     {$value->getGrooveString()}:\n" .
                "{$value->getSteps()};\n";
        }

        return $file;
    }

    /**
     * @param Song $song
     */
    public function setSong(Song $song) {
        $this->song = $song;
    }
}