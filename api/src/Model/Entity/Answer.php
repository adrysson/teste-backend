<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity
 *
 * @property int $id
 * @property int|null $student_id
 * @property int|null $question_id
 * @property int|null $alternative_id
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Alternative $alternative
 */
class Answer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'student_id' => true,
        'question_id' => true,
        'alternative_id' => true,
        'student' => true,
        'question' => true,
        'alternative' => true
    ];
}
