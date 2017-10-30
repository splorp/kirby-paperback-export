<?php header('Content-Type:text/plain'); ?>
<?php foreach ($pages as $page) : ?>
<?php snippet('paperback.page', compact('languages', 'page')) ?>
<?php endforeach ?>
