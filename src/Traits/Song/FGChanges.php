<?php
namespace Zanson\SMParser\Traits\Song;

use Zanson\SMParser\SMException;

/**
 * A value of the format "beat=bg name". Indicates that at 'beat', the
 * background should begin playing a new background named 'bg name'.
 * 'beat' is a fractional value value and 'bg name' is a string.
 * Different bg changes are separated by commas. e.g. "60=falling,80=flower".
 * When StepMania looks for a backgound, it searches in this order:
 *
 * Looks for a movie with file name = "bg name" in the song folder.
 * You must include the file extension in "bg name".
 * e.g. "60=falling.avi,80=flower.mpg".
 *
 * Looks for a BGAnimation folder with the name "bg name" in the song folder.
 *
 * Looks for a movie with file name "bg name" in the RandomMovies folder.
 * You must include the file extension in "bg name".
 * e.g. "60=falling.avi,80=flower.mpg".
 *
 * Looks for a BGAnimation with file name "bg name" in the BGAnimations folder.
 *
 * Looks for a Visualization with the file name "bg name" in the Visualizations
 * folder. For example, if you have a song B4U and special B4U-specific
 * BGAnimations called "robot" and "electric". First, move the robot and
 * electric BGAnimation folders into the B4U song folder
 * (e.g. "Songs\4th Mix\B4U\robot" and "Songs\4th Mix\B4U\electric").
 * Then, using the editor, insert a new background change at each point in the
 * song where you to switch to a new BGAnimation.
 *
 * Class BGChanges
 *
 * @package Zanson\SMParser\Traits\Song
 */
trait FGChanges
{
    public $fgChanges = '';

    /**
     * @return string
     */
    public function getFgChanges() {
        return $this->fgChanges;
    }

    /**
     * @param string $fgChanges
     *
     * @return $this
     * @throws SMException
     */
    public function setFgChanges($fgChanges) {
        if (!is_string($fgChanges)) {
            throw new SMException("FgChanges must be a string");
        }
        $this->fgChanges = $fgChanges;

        return $this;
    }
}