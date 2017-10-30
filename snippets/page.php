@@TOC <?= html($page->title()) ?>

<?= html($page->text()) ?>

<?php if($page->content()->has('Source')): ?>
<?php if($page->source()->pages()->count() > 1) { echo 'Sources'; } else { echo 'Source'; } ?>
<? $n=0; foreach($page->source()->pages() as $source): $n++; ?>
<?php echo html($source->title()) ?>
<?php endforeach ?>
<?php endif ?>

