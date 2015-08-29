<?php
namespace Zanson\SMParser\FileParser;

use Zanson\DebugHelper\Output;
use Zanson\SMParser\Model\SSC\Song;
use Zanson\SMParser\SMNotImplemented;

class SSC
{
    public $song;

    private $fileTagNameToFunction = [
        'VERSION'          => 'Version',
        'TITLE'            => 'Title',
        'SUBTITLE'         => 'Subtitle',
        'ARTIST'           => 'Artist',
        'TITLETRANSLIT'    => 'Titletranslit',
        'SUBTITLETRANSLIT' => 'SubtitleTranslit',
        'ARTISTTRANSLIT'   => 'ArtistTranslit',
        'GENRE'            => 'Genre',
        'ORIGIN'           => 'Origin',
        'CREDIT'           => 'Credit',
        'BANNER'           => 'Banner',
        'BACKGROUND'       => 'Background',
        'PREVIEWVID'       => 'PreviewVid',
        'JACKET'           => 'Jacket',
        'CDIMAGE'          => 'CDImage',
        'DISCIMAGE'        => 'DiscImage',
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
        'PREVIEW'          => 'Preview',
        'DELAYS'           => 'DelaysFromString',
        'WARPS'            => 'WarpsFromString',
        'TIMESIGNATURES'   => 'TimeSignaturesFromString',
        'TICKCOUNTS'       => 'TickCountsFromString',
        'COMBOS'           => 'Combos',
        'SPEEDS'           => 'SpeedsFromString',
        'SCROLLS'          => 'ScrollsFromString',
        'FAKES'            => 'FakesFromString',
        'LABELS'           => 'LabelsFromString',
        'BGCHANGES'        => 'BGChanges',
        'FGCHANGES'        => 'FGChanges',
        'KEYSOUNDS'        => 'KeySounds',
        'ATTACKS'          => 'Attacks',
        'CHARTNAME'        => 'ChartName',
        'STEPSTYPE'        => 'Type',
        'DESCRIPTION'      => 'Description',
        'CHARTSTYLE'       => 'ChartStyle',
        'DIFFICULTY'       => 'Difficulty',
        'METER'            => 'Meter',
        'RADARVALUES'      => 'Groove'
    ];

    /**
     * Parses SM files to the SM song model
     *
     * @param $filePath
     *
     * @throws SMNotImplemented
     */
    function parse($filePath) {
        $filestring  = file_get_contents($filePath);
        $this->song  = new Song();
        $fs          = preg_replace(array("/\/\/.*\n/", "/^\s*[\r\n][\r\n]?/m"), array("\n", ""), $filestring);
        $filearray   = explode(";", $fs);
        $parsingNote = false;
        $noteSet     = null;
        foreach ($filearray as $s) {
            $data = explode(":", trim($s), 2);
            switch (strtoupper($data[0])) {
                case '#NOTEDATA':
                    $parsingNote = true;
                    $noteSet     = $this->song->newNoteSet();
                    break;
                case "#NOTES":
                    $measures = explode(",", $data[1]);
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
                    $parsingNote = false;
                    break;
                case '#RADARVALUES':
                    $data[1] = array_slice(explode(',', $data[1]), 0, 5);
                //Fall through
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

                    if ($parsingNote === false) {
                        $this->song->{$method}($data[1]);
                    } else {
                        $noteSet->{$method}($data[1]);
                    }
                    break;
            }
        }
    }

    public function export() {
        $file = '';
        foreach ($this->fileTagNameToFunction as $tag => $function) {
            $function = str_replace('FromString', '', $function);
            $tag      = strtoupper($tag);
            $function = 'get' . $function;
            if (method_exists($this->song, $function)) {
                $value = $this->song->{$function}();
                $file .= "#$tag:$value;\n";
            }
        }

        foreach ($this->song->notes as $key => $value) {
            $file .=
                "\n//---------------{$value->getType()} - {$value->getDifficulty()} ----------------\n" .
                "#NOTEDATA:;\n" .
                "#CHARTNAME:{$value->getChartName()};\n" .
                "#STEPSTYPE:{$value->getType()};\n" .
                "#DESCRIPTION:{$value->getDescription()};\n" .
                "#CHARTSTYLE:{$value->getChartStyle()};\n" .
                "#DIFFICULTY:{$value->getDifficulty()};\n" .
                "#METER:{$value->getMeter()};\n" .
                "#RADARVALUES:{$value->getGrooveString()};\n" .
                "#CREDIT:{$value->getCredit()};\n" .
                "#ATTACKS:{$value->getAttacks()};\n" .
                "#NOTES:\n{$value->getSteps()};\n";
        }

        return $file;
    }
}