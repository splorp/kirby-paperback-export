<?php

/**
 * Kirby Paperback Export
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

        $includePages      = c::get('paperback.include.pages', ['terms']);
        $includeChildren   = c::get('paperback.include.children', []);
        $includeTemplates  = c::get('paperback.include.templates', []);
        $includeInvisibles = c::get('paperback.include.invisible', true);

        if (! is_array($includePages)) {
            throw new Exception('The option "paperback.include.pages" must be an array.');
        }
        if (! is_array($includeChildren)) {
            throw new Exception('The option "paperback.include.children" must be an array.');
        }
        if (! is_array($includeTemplates)) {
            throw new Exception('The option "paperback.include.templates" must be an array.');
        }

        $languages   = site()->languages();
        $pages       = site()->index();
        $title       = site()->title();
        $description = site()->description();
        $version     = site()->version();

        if (! $includeInvisibles) {
            $pages = $pages->visible();
        }

        if ($includePages) {
            $pages = $pages->find($includePages)->children();
        }

/**
        $pages = $pages
			->filterBy('intendedTemplate', 'not in', $ignoredTemplates);
*/

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
        $paperback  = tpl::load($template, compact('languages', 'pages', 'title', 'description', 'version'));

        return new response($paperback, 'txt');
    }
]);
