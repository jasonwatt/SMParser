<?php
namespace Zanson\SMParser\Model\SSC;

use Zanson\SMParser\Traits\Song\Artist;
use Zanson\SMParser\Traits\Song\ArtistTranslit;
use Zanson\SMParser\Traits\Song\Attacks;
use Zanson\SMParser\Traits\Song\Background;
use Zanson\SMParser\Traits\Song\Banner;
use Zanson\SMParser\Traits\Song\BGChanges;
use Zanson\SMParser\Traits\Song\Bpms;
use Zanson\SMParser\Traits\Song\CDImage;
use Zanson\SMParser\Traits\Song\Cdtitle;
use Zanson\SMParser\Traits\Song\Combos;
use Zanson\SMParser\Traits\Song\Credit;
use Zanson\SMParser\Traits\Song\DiscImage;
use Zanson\SMParser\Traits\Song\Displaybpm;
use Zanson\SMParser\Traits\Song\Fakes;
use Zanson\SMParser\Traits\Song\FGChanges;
use Zanson\SMParser\Traits\Song\Genre;
use Zanson\SMParser\Traits\Song\Jacket;
use Zanson\SMParser\Traits\Song\KeySounds;
use Zanson\SMParser\Traits\Song\Labels;
use Zanson\SMParser\Traits\Song\Origin;
use Zanson\SMParser\Traits\Song\Preview;
use Zanson\SMParser\Traits\Song\Lyricspath;
use Zanson\SMParser\Traits\Song\Music;
use Zanson\SMParser\Traits\Song\Offset;
use Zanson\SMParser\Traits\Song\PreviewVid;
use Zanson\SMParser\Traits\Song\SampleLength;
use Zanson\SMParser\Traits\Song\SampleStart;
use Zanson\SMParser\Traits\Song\Scrolls;
use Zanson\SMParser\Traits\Song\Selectable;
use Zanson\SMParser\Traits\Song\Delays;
use Zanson\SMParser\Traits\Song\Speeds;
use Zanson\SMParser\Traits\Song\Stops;
use Zanson\SMParser\Traits\Song\Subtitle;
use Zanson\SMParser\Traits\Song\SubtitleTranslit;
use Zanson\SMParser\Traits\Song\TickCounts;
use Zanson\SMParser\Traits\Song\Title;
use Zanson\SMParser\Traits\Song\Titletranslit;
use Zanson\SMParser\Traits\Song\Version;
use Zanson\SMParser\Traits\Song\Warps;

class Song implements \JsonSerializable
{
    use Version,
        Title,
        Subtitle,
        Artist,
        Preview,
        Titletranslit,
        SubtitleTranslit,
        ArtistTranslit,
        Genre,
        Origin,
        Credit,
        Banner,
        Background,
        PreviewVid,
        Jacket,
        CDImage,
        DiscImage,
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
        Delays,
        Warps,
        TickCounts,
        Combos,
        Speeds,
        Scrolls,
        Fakes,
        Labels,
        KeySounds,
        BGChanges,
        FGChanges,
        Attacks;

    public $notes = [];

    /**
     * @return Notes
     */
    public function newNoteSet() {
        $this->notes[] = new Notes();

        return end($this->notes);
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
            'Version' => $this->getVersion(),
            'Title'=>$this->getTitle(),
            'Subtitle'=>$this->getSubtitle(),
            'Artist'=>$this->getArtist(),
            'Preview'=>$this->getPreview(),
            'Titletranslit'=>$this->getTitletranslit(),
            'SubtitleTranslit'=>$this->getSubtitleTranslit(),
            'ArtistTranslit'=>$this->getArtistTranslit(),
            'Credit'=>$this->getCredit(),
            'Banner'=>$this->getBanner(),
            'Background'=>$this->getBackground(),
            'Lyricspath'=>$this->getLyricspath(),
            'Cdtitle'=>$this->getCdtitle(),
            'Music'=>$this->getMusic(),
            'Offset'=>$this->getOffset(),
            'SampleStart'=>$this->getSampleStart(),
            'SampleLength'=>$this->getSampleLength(),
            'Selectable'=>$this->getSelectable(),
            'Bpms'=>$this->getBpms(),
            'Displaybpm'=>$this->getDisplaybpm(),
            'Stops'=>$this->getStops(),
            'BGChanges'=>$this->getBGChanges(),
            'FGChanges'=>$this->getFGChanges(),
            'Notes'=>$this->notes,
            'Attacks'=>$this->getAttacks(),
            'Origin' => $this->getOrigin(),
            'PreviewVid' => $this->getPreviewVid(),
            'Jacket' => $this->getJacket(),
            'CDImage' => $this->getCDImage(),
            'DiscImage' => $this->getDiscImage(),
            'Warps' => $this->getWarps(),
            'TickCounts' => $this->getTickCounts(),
            'Combos' => $this->getCombos(),
            'Speeds' => $this->getSpeeds(),
            'Scrolls' => $this->getScrolls(),
            'Fakes' => $this->getFakes(),
            'Labels' => $this->getLabels(),
            'KeySounds' => $this->getKeySounds(),
        ];
    }}