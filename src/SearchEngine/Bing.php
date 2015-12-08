<?php

namespace ImageParser\SearchEngine;

use ImageParser\AbstractEngine;

/**
 * Description of Bing
 *
 * @author Oleksandr Shmyheliuk
 */
class Bing implements EngineInterface
{
    public function getImageUrl($keyword) 
    {
        return sprintf('http://www.bing.com/images/search?q=%s&FORM=HDRSC2', urlencode($keyword));
    }
}
