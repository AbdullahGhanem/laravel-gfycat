# Gfycat and Stickers

[![Latest Stable Version](https://poser.pugx.org/ghanem/gfycat/v/stable)](https://packagist.org/packages/ghanem/gfycat) [![Total Downloads](https://poser.pugx.org/ghanem/gfycat/downloads)](https://packagist.org/packages/ghanem/gfycat) [![Latest Unstable Version](https://poser.pugx.org/ghanem/gfycat/v/unstable)](https://packagist.org/packages/ghanem/gfycat) [![License](https://poser.pugx.org/ghanem/gfycat/license)](https://packagist.org/packages/ghanem/gfycat)

A package that provides an interface between [Laravel](https://laravel.com/docs/8.x) and [Gfycat API](http://api.gfycat.com/), includes Gifs and Stickers.

## Installation
- [Gfycat and Stickers on Packagist](https://packagist.org/packages/ghanem/gfycat)
- [Gfycat and Stickers on GitHub](https://github.com/abdullahghanem/gfycat)


You can install the package via composer:

```bash
composer require ghanem/gfycat
```

now you need to publish the config file with:
```bash
php artisan vendor:publish --provider="Ghanem\Gfycat\GfycatServiceProvider" --tag="config"
```

###### Parameters
+ q - search query term or phrase
+ s - search query term or phrase
+ limit - (optional) number of results to return, maximum 100. Default 25.
+ offset - (optional) results offset, defaults to 0.
+ rating - (optional) limit results to those rated (y,g, pg, pg-13 or r).
+ lang - (optional) specify default country for regional content; format is 2-letter ISO 639-1 country code. See list of supported langauges [here](https://github.com/Gfycat/GfycatAPI#language-support)

### Endpoints

+ [Gifs](#gifs)
	+ [Search](#search)
	+ [Translate](#translate)
	+ [Trending](#trending)
	+ [Random](#random)
	+ [By id](#by-id)
	+ [By id](#by-ids)
+ [Stickers](#stickers)
	+ [Sticker Search](#sticker-search)
	+ [Sticker Translate](#sticker-translate)
	+ [Sticker Trending](#sticker-trending)
	+ [Sticker Random](#sticker-random)

### Gifs

#### Search

Search all Gfycat GIFs for a word or phrase. Punctuation will be stripped and ignored. On this case, `$gfycats` is an array.

Method: Gfycat::search($query, $limit = 25, $offset = 0, $rating = null, $lang = null) 

```php
$gfycats = Gfycat::search('cat');

foreach ($gfycats->data as $gfycat) {
    // Get id
	$gfycat->id;

	// Get image original url
	$gfycat->images->original->url;

	// Get image original mp4 url
	$gfycat->images->original->mp4;

	//etc
}
```

You can do a `dd($gfycats)` to see all attributes:

```php
{#162 ▼
  +"data": array:25 [▼
    0 => {#163 ▼
      +"type": "gif"
      +"id": "W80Y9y1XwiL84"
      +"slug": "gift-W80Y9y1XwiL84"
      +"url": "http://gfycat.com/gifs/gift-W80Y9y1XwiL84"
      ...
    }
    1 => {#182 ▶}
    2 => {#202 ▶}
    ...
```

#### Translate

The translate API draws on search, but uses the Gfycat "special sauce" to handle translating from one vocabulary to another.

Method: Gfycat::translate($query, $rating = null, $lang = null)

```php
$gfycat= Gfycat::translate('cat');

// Get id
$gfycat->data->id;

// Get image original url
$gfycat->data->images->original->url;

// Get image original mp4 url
$gfycat->data->images->original->mp4;

//etc
```

You can do a `dd($gfycat)` to see all attributes:

```php
{#162 ▼
  +"data": {#163 ▼
    +"type": "gif"
    +"id": "3oz8xQQP4ahKiyuxHy"
    ...
    +"images": {#165 ▼
      ...
      +"original": {#180 ▼
        +"url": "http://media3.gfycat.com/media/3oz8xQQP4ahKiyuxHy/gfycat.gif"
        +"width": "480"
        +"height": "352"
        +"size": "3795005"
        +"frames": "33"
        +"mp4": "http://media3.gfycat.com/media/3oz8xQQP4ahKiyuxHy/gfycat.mp4"
        +"mp4_size": "132229"
        +"webp": "http://media3.gfycat.com/media/3oz8xQQP4ahKiyuxHy/gfycat.webp"
        +"webp_size": "756840"
      }
      ...
```

#### Trending

Fetch GIFs currently trending online. On this case, `$gfycats` is an array.

Method: Gfycat::trending($limit = 25, $rating = null)

```php
$gfycats = Gfycat::trending();

foreach ($gfycats->data as $gfycat) {
    // Get id
	$gfycat->id;

	// Get image original url
	$gfycat->images->original->url;

	// Get image original mp4 url
	$gfycat->images->original->mp4;

	//etc
}
```

You can do a `dd($gfycats)` to see all attributes:

```php
{#162 ▼
  +"data": array:25 [▼
    0 => {#163 ▼
      +"type": "gif"
      +"id": "l2SqiAELInKQ8rF0Q"
      +"slug": "2dopequeens-podcast-2-dope-queens-l2SqiAELInKQ8rF0Q"
      +"url": "http://gfycat.com/gifs/2dopequeens-podcast-2-dope-queens-l2SqiAELInKQ8rF0Q"
      ...
    }
    1 => {#183 ▶}
    2 => {#203 ▶}
    ...
```

#### Random

Returns a random GIF, limited by tag.

Method: Gfycat::random($query, $rating = null)

```php
$gfycat = Gfycat::random('cat');

// Get id
$gfycat->data->id;

// Get image original url
$gfycat->data->image_original_url;

// Get image mp4 url
$gfycat->data->image_mp4_url;

//etc
```

You can do a `dd($gfycat)` to see all attributes:

```php
{#162 ▼
  +"data": {#163 ▼
    +"type": "gif"
    +"id": "qbpRDgYI5JoKk"
    +"url": "http://gfycat.com/gifs/cat-qbpRDgYI5JoKk"
    +"image_original_url": "https://media0.gfycat.com/media/qbpRDgYI5JoKk/gfycat.gif"
    ...
  }
  +"meta": {#164 ▼
    +"status": 200
    +"msg": "OK"
  }
}
```

#### By ID 

Returns meta data about a GIF, by GIF id.

Method: Gfycat::getByID($id)

```php
$gfycat= Gfycat::getByID('qbpRDgYI5JoKk');

// Get id
$gfycat->data->id;

// Get image original url
$gfycat->data->images->original->url;

// Get image original mp4 url
$gfycat->data->images->original->mp4;

//etc
```

You can do a `dd($gfycat)` to see all attributes:

```php
{#162 ▼
  +"data": {#163 ▼
    +"type": "gif"
    +"id": "qbpRDgYI5JoKk"
    ...
    +"images": {#164 ▼
      ...
      +"original": {#179 ▼
        +"url": "https://media1.gfycat.com/media/qbpRDgYI5JoKk/gfycat.gif"
        +"width": "500"
        ...
```

#### By IDs 

A multiget version of the get GIF by ID endpoint. On this case, `$gfycats` is an array.

Method: Gfycat::getByIDs(array $ids)

```php
$gfycats = Gfycat::getByIDs(['qbpRDgYI5JoKk','FiGiRei2ICzzG']);

foreach ($gfycats->data as $gfycat) {
    // Get id
	$gfycat->id;

	// Get image original url
	$gfycat->images->original->url;

	// Get image original mp4 url
	$gfycat->images->original->mp4;

	//etc
}
```

You can do a `dd($gfycats)` to see all attributes:

```php
{#162 ▼
  +"data": array:2 [▼
    0 => {#163 ▼
      +"type": "gif"
      +"id": "qbpRDgYI5JoKk"
      +"slug": "cat-qbpRDgYI5JoKk"
      ...
    }
    1 => {#182 ▼
      +"type": "gif"
      +"id": "FiGiRei2ICzzG"
      +"slug": "funny-cat-FiGiRei2ICzzG"
      ...
```

### Stickers

The methods of Stickers are similar to the methods Gfycat, so I will omit the examples of `dd()`, but also you can use it to view all the attributes of objects.

#### Sticker Search

Search all Sticker for a word or phrase. Punctuation will be stripped and ignored. On this case, `$stickers` is an array.

Method: Stickers::search($query, $limit = 25, $offset = 0, $rating = null, $lang = null) 

```php
$stickers = Stickers::search('dog');

foreach ($stickers->data as $sticker) {
    // Get id
	$sticker->id;

	// Get image original url
	$sticker->images->original->url;

	// Get image original mp4 url
	$sticker->images->original->mp4;

	//etc
}
```

#### Sticker Translate

The translate API draws on search, but uses the Stickers "special sauce" to handle translating from one vocabulary to another.

Method: Stickers::translate($query, $rating = null, $lang = null)

```php
$sticker= Stickers::translate('cat');

// Get id
$sticker->data->id;

// Get image original url
$sticker->data->images->original->url;

// Get image original mp4 url
$sticker->data->images->original->mp4;

//etc
```

#### Sticker Trending

Fetch Stickers currently trending online. On this case, `$stickers` is an array.

Method: Stickers::trending($limit = 25, $rating = null)

```php
$stickers = Stickers::trending();

foreach ($stickers->data as $sticker) {
    // Get id
	$sticker->id;

	// Get image original url
	$sticker->images->original->url;

	// Get image original mp4 url
	$sticker->images->original->mp4;

	//etc
}
```

#### Sticker Random 

Returns a random Sticker, limited by tag.

Method: Stickers::random($query, $rating = null)

```php
$sticker = Stickers::random('cat');

// Get id
$sticker->data->id;

// Get image original url
$sticker->data->image_original_url;

// Get image mp4 url
$sticker->data->image_mp4_url;

//etc
```
