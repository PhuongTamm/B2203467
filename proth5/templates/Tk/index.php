<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tk> $tk
 */
?>
<div class="tk index content">
    <?= $this->Html->link(__('New Tk'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tk') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('full_name') ?></th>
                    <th><?= $this->Paginator->sort('cumulative_score') ?></th>
                    <th><?= $this->Paginator->sort('courses_taken') ?></th>
                    <th><?= $this->Paginator->sort('courses_counted') ?></th>
                    <th><?= $this->Paginator->sort('total_credits') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tk as $tk): ?>
                <tr>
                    <td><?= $this->Number->format($tk->id) ?></td>
                    <td><?= $tk->hasValue('student') ? $this->Html->link($tk->student->full_name, ['controller' => 'Students', 'action' => 'view', $tk->student->id]) : '' ?></td>
                    <td><?= h($tk->full_name) ?></td>
                    <td><?= $tk->cumulative_score === null ? '' : $this->Number->format($tk->cumulative_score) ?></td>
                    <td><?= $this->Number->format($tk->courses_taken) ?></td>
                    <td><?= $tk->courses_counted === null ? '' : $this->Number->format($tk->courses_counted) ?></td>
                    <td><?= $tk->total_credits === null ? '' : $this->Number->format($tk->total_credits) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tk->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tk->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tk->id)]) ?>
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