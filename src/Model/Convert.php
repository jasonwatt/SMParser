<?php
namespace Zanson\SMParser\Model;

class Convert
{
    /**
     * @param SM\Song $sm
     *
     * @return SSC\Song
     */
    public function SMtoSSC(SM\Song $sm) {
        $ssc = new SSC\Song();

        foreach ($sm as $key->$value) {
            $ssc->{$key} = $value;
        }

        return $ssc;

    }
}