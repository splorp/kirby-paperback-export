<?php header('Content-Type:text/plain'); ?>
<?php header('Content-Disposition: attachment; filename="paperback.txt"'); ?>
<?php echo $title . PHP_EOL . PHP_EOL . $description . PHP_EOL . PHP_EOL ?>
<?php foreach ($pages as $page) : ?>
<?php snippet('paperback.page', compact('languages', 'page')) ?>
<?php endforeach ?>
