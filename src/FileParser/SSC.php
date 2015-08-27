<?php
namespace Zanson\SMParser\FileParser;

use Zanson\SMParser\Model\SSC\Song;
use Zanson\SMParser\SMNotImplemented;

class SSC
{
    public $song;

    private $fileTagNameToFunction = [
        'TITLE'            => 'Title',
        'SUBTITLE'         => 'Subtitle',
        'ARTIST'           => 'Artist',
        'GENRE'            => 'Genre',
        'TITLETRANSLIT'    => 'Titletranslit',
        'SUBTITLETRANSLIT' => 'SubtitleTranslit',
        'ARTISTTRANSLIT'   => 'ArtistTranslit',
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
        'FGCHANGES'        => 'FGChanges',
        'VERSION'          => 'Version',
        'PREVIEW'          => 'Preview',
        'ORIGIN'           => 'Origin',
        'PREVIEWVID'       => 'PreviewVid',
        'JACKET'           => 'Jacket',
        'CDIMAGE'          => 'CDImage',
        'DISCIMAGE'        => 'DiscImage',
        'DELAYS'           => 'Delays',
        'WARPS'            => 'Warps',
        'TICKCOUNTS'       => 'TickCounts',
        'COMBOS'           => 'Combos',
        'SPEEDS'           => 'Speeds',
        'SCROLLS'          => 'Scrolls',
        'FAKES'            => 'Fakes',
        'LABELS'           => 'Labels',
        'KEYSOUNDS'        => 'KeySounds',
        'ATTACKS'          => 'Attacks'
    ];

    /**
     * Parses SM files to the SM song model
     *
     * @param $filePath
     *
     * @throws SMNotImplemented
     */
    //TODO: Add NOTEDATA Parsing
    function parse($filePath) {
        $filestring = file_get_contents($filePath);
        $this->song = new Song();
        $fs         = preg_replace(array("/\/\/.*\n/", "/^\s*[\r\n][\r\n]?/m"), array("\n", ""), $filestring);
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
}

?>
