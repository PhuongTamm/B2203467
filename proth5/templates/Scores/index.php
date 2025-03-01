<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Score> $scores
 */
?>
<div class="scores index content">
    <?= $this->Html->link(__('New Score'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Scores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('course_id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('score') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($scores as $score): ?>
                <tr>
                    <td><?= $this->Number->format($score->id) ?></td>
                    <td><?= $score->hasValue('course') ? $this->Html->link($score->course->semester, ['controller' => 'Courses', 'action' => 'view', $score->course->id]) : '' ?></td>
                    <td><?= $score->hasValue('student') ? $this->Html->link($score->student->full_name, ['controller' => 'Students', 'action' => 'view', $score->student->id]) : '' ?></td>
                    <td><?= $this->Number->format($score->score) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $score->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $score->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $score->id], ['confirm' => __('Are you sure you want to delete # {0}?', $score->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>