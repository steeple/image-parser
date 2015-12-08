<?php

namespace ImageParser\Filter;

/**
 * Description of CallbackFilter
 *
 * @author Oleksandr Shmyheliuk
 */
class CallbackFilter implements FilterInterface
{
    /**
     * @var callable
     */
    private $callback;

    /**
     * CallbackFilter constructor.
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param array $images
     * @return array
     */
    public function filter(array $images)
    {
        return call_user_func($this->callback, $images);
    }
}