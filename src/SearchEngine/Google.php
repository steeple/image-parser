<?php

namespace ImageParser\SearchEngine;

use ImageParser\AbstractEngine;

/**
 * Description of Google
 *
 * @author Oleksandr Shmyheliuk
 */
class Google implements EngineInterface
{
    public function getImageUrl($keyword) 
    {
        return sprintf('https://www.google.com.ua/search?q=%s&source=lnms&tbm=isch&sa=X&ei=3IkKVdKuEMf-ywPkgIHwCg&ved=0CAcQ_AUoAQ&biw=2495&bih=1299', urlencode($keyword));
    }
}