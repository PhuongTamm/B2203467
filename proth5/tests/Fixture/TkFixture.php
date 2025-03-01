<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TkFixture
 */
class TkFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'tk';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'student_id' => 1,
                'full_name' => 'Lorem ipsum dolor sit amet',
                'cumulative_score' => 1.5,
                'courses_taken' => 1,
                'courses_counted' => 1.5,
                'total_credits' => 1.5,
            ],
        ];
        parent::init();
    }
}
