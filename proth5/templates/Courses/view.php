<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Courses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Course'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="courses view content">
            <h3><?= h($course->semester) ?></h3>
            <table>
                <tr>
                    <th><?= __('Subject') ?></th>
                    <td><?= $course->hasValue('subject') ? $this->Html->link($course->subject->name, ['controller' => 'Subjects', 'action' => 'view', $course->subject->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Semester') ?></th>
                    <td><?= h($course->semester) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($course->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Scores') ?></h4>
                <?php if (!empty($course->scores)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Course Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Score') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($course->scores as $score) : ?>
                        <tr>
                            <td><?= h($score->id) ?></td>
                            <td><?= h($score->course_id) ?></td>
                            <td><?= h($score->student_id) ?></td>
                            <td><?= h($score->score) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Scores', 'action' => 'view', $score->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Scores', 'action' => 'edit', $score->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Scores', 'action' => 'delete', $score->id], ['confirm' => __('Are you sure you want to delete # {0}?', $score->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>