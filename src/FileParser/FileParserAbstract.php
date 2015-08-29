<?php
namespace Zanson\SMParser\FileParser;

use Zanson\SMParser\SMException;

abstract class FileParserAbstract
{
    protected $fileExtension = '';

    /**
     * @var Song
     */
    public $song;

    function parse($fileContents) {

    }

    public function export() {

    }

    /**
     * File/Folder safe name of song
     *
     * @return string
     * @throws SMException
     */
    public function getFileSafeTitle() {
        if(empty($this->song)){
            throw new SMException('Song myst be set');
        }
        return Utility::GenerateSafeFileName($this->song->getTitle());
    }

    /**
     * Full file name
     *
     * @return string
     * @throws SMException
     */
    public function getFileName() {
        if(empty($this->song)){
            throw new SMException('Song myst be set');
        }
        return $this->getFileSafeTitle() . '.' . $this->fileExtension;
    }
}