<?php

namespace ImageParser\Filter;

/**
 * Description of WordFilter
 *
 * @author Oleksandr Shmyheliuk
 */
class WordFilter implements FilterInterface
{
    /**
     * @var string|array
     */
    private $words;

    /**
     * WordFilter constructor.
     * @param string|array $words
     */
    public function __construct($words)
    {
        if (!is_array($words)) {
            $words = [$words];
        }
        $this->words = $words;
    }

    public function filter(array $images)
    {
        $filter_pattern = '/' . implode('|', $this->words) . '/i';
        return array_filter($images, function($image) use ($filter_pattern) {
            return !preg_match($filter_pattern, $image);
        });
    }
}