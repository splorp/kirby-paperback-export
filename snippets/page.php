<?php echo '@@TOC ' . $page->title() . PHP_EOL . PHP_EOL ?>
<?php echo html_entity_decode(strip_tags($page->text()->kirbytext())) . PHP_EOL . PHP_EOL ?>
<?php if($page->content()->has('Source')): ?>
<?php if($page->source()->pages()->count() > 1) { echo 'Sources: '; } else { echo 'Source: '; } ?>
<? $n=0; foreach($page->source()->pages() as $source): $n++; ?>
<?php echo $source->title() . PHP_EOL ?>
<?php endforeach ?>
<?php echo PHP_EOL ?>
<?php endif ?>
