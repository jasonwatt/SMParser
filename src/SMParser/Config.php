<?php
/**
 * Created by PhpStorm.
 * User: z
 * Date: 8/23/2015
 * Time: 1:47 AM
 */

namespace Zanson\SMParser;


class Config
{
    public static $typesList = [
        'dance-single' => 4, //(Left,Down,Up,Right)
        'dance-double' => 8,
        'dance-couple' => 8,
        'dance-solo'   => 6,
        'pump-single'  => 5,
        'pump-double'  => 10,
        'pump-couple'  => 10,
        'ez2-single'   => 5,
        'ez2-double'   => 10,
        'ez2-real'     => 7,
        'para-single'  => 5
    ];

    public static $difficultiesList = [
        'Beginner',
        'Easy',
        'Medium',
        'Hard',
        'Challenge',
        'Edit'
    ];
}