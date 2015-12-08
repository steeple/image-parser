<?php

namespace ImageParser\SearchEngine;

/**
 * Description of Factory
 *
 * @author Oleksandr Shmyheliuk
 */
class Factory
{
    public static function getEngine($name)
    {
        switch ($name)
        {
            case 'bing':
                $engine = new Bing();
                break;
            case 'google':
                $engine = new Google();
                break;
            default:
                throw new \Exception('No such engine');
                break;
        }
        return $engine;
    }
}
