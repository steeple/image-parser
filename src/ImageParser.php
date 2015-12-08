<?php

namespace ImageParser;

use ImageParser\Filter\FilterCollection;
use ImageParser\Filter\FilterInterface;
use ImageParser\Parser\ParserInterface;
use ImageParser\SearchEngine\EngineInterface;
use ImageParser\SearchEngine\Factory;
use yii\base\Exception;

/**
 * Description of ImageParser
 *
 * @author Oleksandr Shmyheliuk
 */
class ImageParser
{
    /**
     * @var ParserInterface
     */
    private $parser;
    /**
     * @var EngineInterface
     */
    private $search_engine;
    /**
     * @var FilterCollection
     */
    private $filter_collection;

    /**
     * ImageParser constructor.
     * @param ParserInterface $parser
     * @param EngineInterface|null $search_engine
     */
    public function __construct(ParserInterface $parser, EngineInterface $search_engine = null)
    {
        $this->setParser($parser);
        if (!$search_engine instanceof EngineInterface) {
            $search_engine = Factory::getEngine('google');
        }
        $this->setSearchEngine($search_engine);
        $this->filter_collection = new FilterCollection();
    }

    /**
     * @param $keyword
     * @return array
     */
    public function getImagesUrlForKeyword($keyword)
    {
        $url = $this->search_engine->getImageUrl($keyword);
        $html = $this->parser->parseUrl($url);

        preg_match_all('/(?P<img>(http|https):\/\/[^\s]*?\.(jpg|png|jpeg))/', $html, $matches);
        $images = $matches['img'];
        $images = array_filter($images, function($value) {
           return strpos($value, 'bing') === false && mb_strlen($value) < 500;
        });

        return $this->filter_collection->filter($images);
    }

    /**
     * @param ParserInterface $parser
     */
    public function setParser($parser)
    {
        $this->parser = $parser;
    }

    /**
     * @return ParserInterface
     * @throws Exception
     */
    public function getParser()
    {
        if (!$this->parser instanceof ParserInterface) {
            throw new Exception('Parser not set');
        }
        return $this->parser;
    }


    /**
     * @return EngineInterface
     */
    public function getSearchEngine()
    {
        return $this->search_engine;
    }

    /**
     * @param EngineInterface $search_engine
     */
    public function setSearchEngine($search_engine)
    {
        $this->search_engine = $search_engine;
    }

    /**
     * @param FilterInterface $filter
     */
    public function addFilter(FilterInterface $filter)
    {
        $this->filter_collection->addFilter($filter);
    }
}
