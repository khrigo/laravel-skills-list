<?php
declare(strict_types=1);

namespace Khrigo\SkillsList\Tests;

use Khrigo\SkillsList\SkillsList;
use PHPUnit\Framework\TestCase;

class SkillsListTest extends TestCase
{
    /**
     * @var SkillsList
     */
    private $skillsList;

    protected function setUp(): void
    {
        $this->skillsList = new SkillsList('vendor/khrigo/skills-list/data');
    }

    protected function tearDown(): void
    {
        unset($this->skillsList);
        $this->skillsList = null;
    }

    /**
     * @test
     */
    public function getDataDirTest(): void
    {
        $this->assertEquals(realpath('vendor/khrigo/skills-list/data'), $this->skillsList->getDataDir());
    }

    /**
     * @test
     */
    public function getListJSONTest(): void
    {
        $this->skillsList->setList([
            'json' => '{"A":"Skill A","B":"Skill B","C":"Skill C"}'
        ]);

        $this->assertEquals(
            '{"A":"Skill A","B":"Skill B","C":"Skill C"}',
            $this->skillsList->getList('json')
        );
    }
}
