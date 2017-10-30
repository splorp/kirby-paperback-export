<?php

/**
 * Kirby PaperBack Export
 *
 * @version   1.0.0
 * @author    Grant Hutchinson <grant@splorp.com>
 * @copyright Grant Hutchinson <grant@splorp.com>
 * @link      https://github.com/splorp/kirby-paperback-export
 * @license   MIT
 */

kirby()->set('snippet', 'paperback.page', __DIR__ . '/snippets/page.php');

kirby()->set('route', [
    'pattern' => 'export/paperback',
    'action'  => function() {

        $includeInvisibles = c::get('paperback.include.invisible', false);
        $ignoredPages      = c::get('paperback.ignored.pages', []);
        $ignoredTemplates  = c::get('paperback.ignored.templates', []);

        if (! is_array($ignoredPages)) {
            throw new Exception('The option "paperback.ignored.pages" must be an array.');
        }

        if (! is_array($ignoredTemplates)) {
            throw new Exception('The option "paperback.ignored.templates" must be an array.');
        }

        $languages = site()->languages();
        $pages     = site()->index();

        if (! $includeInvisibles) {
            $pages = $pages->visible();
        }

        $pages = $pages
                    ->not($ignoredPages)
                    ->filterBy('intendedTemplate', 'not in', $ignoredTemplates);

        $process = c::get('paperback.process', null);

        if ($process instanceof Closure) {
            $pages = $process($pages);

            if (! $pages instanceof Collection) {
                throw new Exception('The option "paperback.process" must return a Collection.');
            }
        } elseif (! is_null($process)) {
            throw new Exception($process . ' is not callable.');
        }

        $template = __DIR__ . DS . 'paperback-export.txt.php';
        $paperback  = tpl::load($template, compact('languages', 'pages'));

        return new response($paperback, 'txt');
    }
]);
