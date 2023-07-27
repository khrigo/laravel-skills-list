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

/**
 * SkillsList
 *
 * @author Khrigo <me@khrigo.com>
 */
class SkillsList
{
    /**
     * Path to the directory containing skills data.
     * @var string
     */
    protected $dataDir;

    /**
     * Cached data.
     * @var array
     */
    protected $dataCache = [];

    /**
     * Constructor.
     *
     * @param string|null $dataDir  Path to the directory containing skills data
     */
    public function __construct(?string $dataDir = null)
    {
        if (!isset($dataDir)) {
            $dataDir = base_path('vendor/khrigo/skills-list/data');
        }

        if (!is_dir($dataDir)) {
            throw new \RuntimeException(sprintf('Unable to locate the skills data directory at "%s"', $dataDir));
        }

        $this->dataDir = realpath($dataDir);
    }

    /**
     * Get the skills data directory.
     *
     * @return string
     */
    public function getDataDir(): string
    {
        return $this->dataDir;
    }

    /**
     * Returns a list of skills.
     *
     * @param string $format  The format (default: json)
     * @return mixed          An array (list) with skills or raw data
     */
    public function getList(string $format = 'json')
    {
        return $this->loadData($format);
    }

    /**
     * @param array $data     An array (list) with skills data
     * @return SkillsList    The instance of SkillsList to enable fluent interface
     */
    public function setList(array $data): SkillsList
    {
        $this->dataCache = $data;

        return $this;
    }

    /**
     * A lazy-loader that loads data from a JSON file if it is not stored in memory yet.
     *
     * @param string $format  The format (default: json)
     * @return mixed          An array (list) with skills or raw data
     */
    protected function loadData(string $format)
    {
        if (!isset($this->dataCache[$format])) {
            $file = sprintf('%s/skills.%s', $this->dataDir, $format);

            if (!is_file($file)) {
                throw new \RuntimeException(sprintf('Unable to load the skills data file "%s"', $file));
            }

            $this->dataCache[$format] = file_get_contents($file);
        }

        return $this->dataCache[$format];
    }
}
