<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tk $tk
 * @var string[]|\Cake\Collection\CollectionInterface $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tk->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tk->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tk'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tk form content">
            <?= $this->Form->create($tk) ?>
            <fieldset>
                <legend><?= __('Edit Tk') ?></legend>
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
