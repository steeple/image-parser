# image-parser

```php
$image_parser = new \ImageParser\ImageParser(new \ImageParser\Parser\Adapter\GuzzleAdapter());
$image_parser->addFilter(new \ImageParser\Filter\WordFilter(['wikipedia']));
$images = $image_parser->getImagesUrlForKeyword('Lviv');
```
