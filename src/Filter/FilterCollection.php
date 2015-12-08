<?php

namespace ImageParser\Filter;

/**
 * Description of FilterCollection
 *
 * @author Oleksandr Shmyheliuk
 */
class FilterCollection implements FilterInterface
{
    /**
     * @var FilterInterface[]
     */
    private $filters = [];

    public function filter(array $images)
    {
        foreach ($this->filters as $filter) {
            $images = $filter->filter($images);
        }
        return $images;
    }

    /**
     * @param FilterInterface $filter
     */
    public function addFilter(FilterInterface $filter)
    {
        array_push($this->filters, $filter);
    }
}