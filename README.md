# Inspiring Kaamelott

Get an inspiring quote from Kaamelott.

## How to use

Update your `routes/console.php` Laravel file

```php
Artisan::command('inspire', function (): void {
    $this->comment(\BaBeuloula\InspiringKaamelott\Inspiring::quote());
})->describe('Display an inspiring quote from Kaamelott.');
```
