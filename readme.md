# Yandex referat text generator for php faker.

## Installation

```bash
composer require nikitakiselev/faker-yandex-referat-provider dev-master
```

```php
$faker = new \Faker\Factory::create();
$faker->addProvider(new \Nikitakiselev\YandexReferatProvider($faker));
var_dump($faker->essay());
```

You can use one of the predefined theme:
```php
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
```

```php
use Nikitakiselev\YandexReferatProvider;

$faker->essay(YandexReferatProvider::THEME::POLIT);
```