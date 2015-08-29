<?php
namespace Zanson\SMParser\FileParser;


interface FileParserInterface
{
    /**
     * @param $fileContents
     *
     * @return null
     */
    function parse($fileContents);

    /**
     * @return string
     */
    public function export();

    /**
     * We must have a song method, but can't enforce it since we want to enforce
     * the specific song model for the parsing class.
     */
    //public function setSong(Song $song);
}