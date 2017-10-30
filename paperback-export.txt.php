<?php // Echo header to avoid issue when PHP short tag is enabled ?>
<?= '<?xml version="1.0" encoding="utf-8"?>'; ?>
<?php foreach ($pages as $page) : ?>
<?php snippet('paperback.page', compact('languages', 'page')) ?>
<?php endforeach ?>
