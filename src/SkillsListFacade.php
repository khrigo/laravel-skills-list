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

use Illuminate\Support\Facades\Facade;

/**
 * SkillsListFacade
 *
 * @author Khrigo <me@khrigo.com>
 *
 * @method static string getDataDir()
 * @method static array getList(string $format = 'json')
 * @method static SkillsList setList(array $data)
 */
class SkillsListFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SkillsList::class;
    }
}
