# Inspiring Kaamelott

Get an inspiring quote from Kaamelott.

## How to use

`composer require babeuloula/inspiring-kaamelott`

### Laravel

Update your `routes/console.php` Laravel file

```php
Artisan::command('inspire', function (): void {
    $this->comment(\BaBeuloula\InspiringKaamelott\Inspiring::quoteForConsole());
})->describe('Display an inspiring quote from Kaamelott.');
```

### Without framework

- `\BaBeuloula\InspiringKaamelott\Inspiring::quote()`: get a quote
- `\BaBeuloula\InspiringKaamelott\Inspiring::quotes()`: get all quotes

## Contribute

Install the vendors with `make vendors`.

You can execute code quality with `make tests` and if you need to connect to the PHP container `docker/exec`.
