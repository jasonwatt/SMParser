<?php
namespace Zanson\SMParser\Model;

use Zanson\DebugHelper\Output;

class Convert
{
    /**
     * @param SM\Song $sm
     *
     * @return SSC\Song
     */
    public function SMtoSSC(SM\Song $sm) {
        $ssc = new SSC\Song();

        foreach ($sm as $key => $value) {
            if ($key == 'notes') {
                foreach ($value as $noteSet) {
                    $newNoteSet = $ssc->newNoteSet();
                    foreach ($noteSet as $nkey => $nvalue) {
                        $newNoteSet->{$nkey} = $nvalue;
                    }
                }
            } else {
                $ssc->{$key} = $value;
            }
        }

        return $ssc;

    }

    public function SSCtoSM(SSC\Song $ssc) {
        $sm = new SM\Song();

        foreach ($ssc as $key => $value) {
            try {
                if ($key == 'notes') {
                    foreach ($value as $noteSet) {
                        $newNoteSet = $sm->newNoteSet();
                        foreach ($noteSet as $nkey => $nvalue) {
                            $newNoteSet->{$nkey} = $nvalue;
                        }
                    }
                } else {
                    $sm->{$key} = $value;
                }
            } catch (\Exception  $e) {

            }
        }

        return $sm;
    }
}