<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tk Entity
 *
 * @property int $id
 * @property int $student_id
 * @property string $full_name
 * @property string|null $cumulative_score
 * @property int $courses_taken
 * @property string|null $courses_counted
 * @property string|null $total_credits
 *
 * @property \App\Model\Entity\Student $student
 */
class Tk extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'id' => true,
        'student_id' => true,
        'full_name' => true,
        'cumulative_score' => true,
        'courses_taken' => true,
        'courses_counted' => true,
        'total_credits' => true,
        'student' => true,
    ];
}
