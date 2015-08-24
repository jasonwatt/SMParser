<?php
/**
 * Created by PhpStorm.
 * User: z
 * Date: 8/23/2015
 * Time: 1:26 AM
 */

namespace Zanson\SMParser\Model;


use Zanson\SMParser\Traits\Song\Artist;
use Zanson\SMParser\Traits\Song\ArtistTranslit;
use Zanson\SMParser\Traits\Song\Background;
use Zanson\SMParser\Traits\Song\Banner;
use Zanson\SMParser\Traits\Song\BGChanges;
use Zanson\SMParser\Traits\Song\Bpms;
use Zanson\SMParser\Traits\Song\Cdtitle;
use Zanson\SMParser\Traits\Song\Credit;
use Zanson\SMParser\Traits\Song\Displaybpm;
use Zanson\SMParser\Traits\Song\FGChanges;
use Zanson\SMParser\Traits\Song\Genre;
use Zanson\SMParser\Traits\Song\Lyricspath;
use Zanson\SMParser\Traits\Song\Music;
use Zanson\SMParser\Traits\Song\Offset;
use Zanson\SMParser\Traits\Song\SampleLength;
use Zanson\SMParser\Traits\Song\SampleStart;
use Zanson\SMParser\Traits\Song\Selectable;
use Zanson\SMParser\Traits\Song\Stops;
use Zanson\SMParser\Traits\Song\Subtitle;
use Zanson\SMParser\Traits\Song\SubtitleTranslit;
use Zanson\SMParser\Traits\Song\Title;
use Zanson\SMParser\Traits\Song\Titletranslit;

class Song
{
    use Title,
        Subtitle,
        Artist,
        Genre,
        Titletranslit,
        SubtitleTranslit,
        ArtistTranslit,
        Credit,
        Banner,
        Background,
        Lyricspath,
        Cdtitle,
        Music,
        Offset,
        SampleStart,
        SampleLength,
        Selectable,
        Bpms,
        Displaybpm,
        Stops,
        BGChanges,
        FGChanges;

    public $notes = [];

    public $fileTagNameToFunction = [
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
        'FGCHANGES'        => 'FGChanges'
    ];

    /**
     * @return Notes
     */
    public function newNoteSet() {
        $this->notes[] = new Notes();

        return end($this->notes);
    }
}