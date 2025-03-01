<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tk $tk
 * @var \Cake\Collection\CollectionInterface|string[] $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tk'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tk form content">
            <?= $this->Form->create($tk) ?>
            <fieldset>
                <legend><?= __('Add Tk') ?></legend>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('full_name');
                    echo $this->Form->control('cumulative_score');
                    echo $this->Form->control('courses_taken');
                    echo $this->Form->control('courses_counted');
                    echo $this->Form->control('total_credits');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
