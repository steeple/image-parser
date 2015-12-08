<?php

namespace ImageParser\Parser\Adapter;

/**
 * Description of SnoopyAdapter
 *
 * @author Oleksandr Shmyheliuk
 */
class SnoopyAdapter implements ParserInterface
{
    private $snoopy;

    public function __construct(Snoopy $snoopy = null)
    {
        if ($snoopy == null && class_exists('\Snoopy')) {
            $snoopy = new \Snoopy();
        }
        $this->snoopy = $snoopy;
    }


    public function parseUrl($url)
    {
        $this->snoopy->fetch($url);
        return $this->snoopy->results;
    }
}