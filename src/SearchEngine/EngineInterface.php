<?php

namespace ImageParser\SearchEngine;

/**
 * Description of EngineInterface
 *
 * @author Oleksandr Shmyheliuk
 */
interface EngineInterface
{
    public function getImageUrl($keyword);
}