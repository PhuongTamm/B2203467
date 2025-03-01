<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tk $tk
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tk'), ['action' => 'edit', $tk->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tk'), ['action' => 'delete', $tk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tk->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tk'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tk'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tk view content">
            <h3><?= h($tk->full_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $tk->hasValue('student') ? $this->Html->link($tk->student->full_name, ['controller' => 'Students', 'action' => 'view', $tk->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Full Name') ?></th>
                    <td><?= h($tk->full_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tk->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cumulative Score') ?></th>
                    <td><?= $tk->cumulative_score === null ? '' : $this->Number->format($tk->cumulative_score) ?></td>
                </tr>
                <tr>
                    <th><?= __('Courses Taken') ?></th>
                    <td><?= $this->Number->format($tk->courses_taken) ?></td>
                </tr>
                <tr>
                    <th><?= __('Courses Counted') ?></th>
                    <td><?= $tk->courses_counted === null ? '' : $this->Number->format($tk->courses_counted) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Credits') ?></th>
                    <td><?= $tk->total_credits === null ? '' : $this->Number->format($tk->total_credits) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>