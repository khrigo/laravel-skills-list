<?php
declare(strict_types=1);

namespace Khrigo\SkillsList;

/**
 * This file is part of Khrigo-SkillsList
 *
 * (c) 2023 Khrigo
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 *
 * @category    Khrigo
 * @package     SkillsList
 * @copyright   (c) 2023 Khrigo <me@khrigo.com>
 */

use Illuminate\Support\ServiceProvider;

/**
 * SkillsListServiceProvider
 *
 * @author Khrigo <me@khrigo.com>
 */
class SkillsListServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('skillslist', function ($app) {
            return new SkillsList(base_path('vendor/khrigo/skills-list/data'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['skillslist'];
    }
}
