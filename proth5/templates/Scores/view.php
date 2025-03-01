<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Score $score
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Score'), ['action' => 'edit', $score->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Score'), ['action' => 'delete', $score->id], ['confirm' => __('Are you sure you want to delete # {0}?', $score->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Scores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Score'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="scores view content">
            <h3><?= h($score->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Course') ?></th>
                    <td><?= $score->hasValue('course') ? $this->Html->link($score->course->semester, ['controller' => 'Courses', 'action' => 'view', $score->course->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $score->hasValue('student') ? $this->Html->link($score->student->full_name, ['controller' => 'Students', 'action' => 'view', $score->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($score->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Score') ?></th>
                    <td><?= $this->Number->format($score->score) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>