# Skills List

Skills List is a package for Laravel which lists all LinkedIn skills.


## Installation

Run `composer require khrigo/laravel-skills-list`.

If you don't use auto-discovery, add the ServiceProvider to the `providers` array in `config/app.php`

```php
Khrigo\SkillsList\SkillsListServiceProvider::class,
```

If needed, add the following alias as well

```php
'Skills' => Khrigo\SkillsList\SkillsListFacade::class,
```

## Usage

- Format (json, txt)

Get all skills

```php
Route::get('/skills', function()
{
	return Skills::getList('json');
});
```
