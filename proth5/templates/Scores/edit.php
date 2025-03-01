<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Score $score
 * @var string[]|\Cake\Collection\CollectionInterface $courses
 * @var string[]|\Cake\Collection\CollectionInterface $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $score->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $score->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Scores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="scores form content">
            <?= $this->Form->create($score) ?>
            <fieldset>
                <legend><?= __('Edit Score') ?></legend>
                <?php
                    echo $this->Form->control('course_id', ['options' => $courses]);
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('score');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
