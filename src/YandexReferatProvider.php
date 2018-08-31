<?php

namespace Nikitakiselev;

/**
 * Class YandexReferatProvider
 */
class YandexReferatProvider
{
    const THEME_ASTRONOMY = 'astronomy';
    const THEME_GEOLOGY = 'geology';
    const THEME_GYROSCOPE = 'gyroscope';
    const THEME_LITERATURE = 'literature';
    const THEME_MARKETING = 'marketing';
    const THEME_MATHEMATICS = 'mathematics';
    const THEME_MUSIC = 'music';
    const THEME_POLIT = 'polit';
    const THEME_AGROBIOLOGIA = 'agrobiologia';
    const THEME_PSYCHOLOGY = 'psychology';
    const THEME_GEOGRAPHY = 'geography';
    const THEME_PHYSICS = 'physics';
    const THEME_PHILOSOPHY = 'philosophy';
    const THEME_CHEMISTRY = 'chemistry';
    const THEME_ESTETICA = 'estetica';

    protected static $serviceUrl = 'https://yandex.ru/referats';

    /**
     * @var \Faker\Factory
     */
    protected $faker;

    /**
     * YandexReferat constructor.
     *
     * @param \Faker\Generator $faker
     */
    public function __construct(\Faker\Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Get random essay.
     *
     * @param string|null $theme
     *
     * @return string
     * @throws \Nikitakiselev\YandexReferatException
     * @throws \Exception
     */
    public function essay(string $theme = null): string
    {
        $theme = $theme ?? static::THEME_PHILOSOPHY;

        $query = [
            't' => $theme,
            's' => random_int(10000, 99999),
        ];

        $serviceUrl = static::$serviceUrl . '?' . http_build_query($query);
        $html = file_get_contents($serviceUrl);

        $regexp = "/<div class=\"layout__main\"><div class=\"referats__text\"><div>.*<\/div><strong>.*<\/strong>/";
        $matches = [];
        preg_match($regexp, $html, $matches);

        if (! $matches) {
            throw new YandexReferatException('Can\'t parse yandex referat.');
        }

        $start = mb_strpos($html, $matches[0]) + mb_strlen($matches[0]);
        $end = mb_strpos($html, '</div><div><button class="button button_theme_normal');

        return mb_substr($html, $start, $end - $start);
    }
}
