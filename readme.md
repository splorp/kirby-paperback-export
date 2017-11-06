# Kirby Paperback Export

Export [Kirby](https://getkirby.com/) content for use with the [Paperback Book Maker](https://ritsuko.chuma.org/paperback/).

## What does this plugin do?

The plugin generates a lightly formatted plain text file from a set of pages specified by the user. The text file is used to create a “book” package which can be viewed on a Newton OS device.

An example of this file can be downloaded using the following link. The file contains all of the terms currently published on the [Newton Glossary](http://newtonglossary.com/) site.

[newtonglossary.com/export/paperback](http://newtonglossary.com/export/paperback)

## What is a Paperback book, you ask?

Paperback is a simple cross-platform utility created by [David Fedor](http://thefedors.com/pobox/) that takes plain text files and quickly packages them for viewing on a Newton OS device. Since the Paperback utility only runs under classic Mac OS and Windows, an online [Paperback Book Maker](https://ritsuko.chuma.org/paperback/) was developed by [Victor Rehorst](https://github.com/chuma) for all your cross-platform needs.

## Installation

After installing the plugin using one of the methods listed below, visiting `yoursite.com/export/paperback` should automatically download a text file without any additional configuration.

### Download

To install the plugin manually, [download the files](https://github.com/splorp/kirby-paperback-export/archive/master.zip) and put them in:

`site/plugins/paperback-export`

### Kirby CLI

Installing the plugin using the Kirby [command line interface](https://github.com/getkirby/cli):

    $ kirby plugin:install splorp/kirby-paperback-export

Updating the plugin using the Kirby CLI:

    $ kirby plugin:update splorp/kirby-paperback-export

### Git Submodule

Installing the plugin as a Git submodule:

    $ cd your/project/root
    $ git submodule add https://github.com/splorp/kirby-paperback-export.git site/plugins/paperback-export
    $ git submodule update --init --recursive
    $ git commit -am "Add Kirby Paperback Export plugin"

Updating the plugin as a Git submodule:

    $ cd your/project/root
    $ git submodule foreach git checkout master
    $ git submodule foreach git pull
    $ git commit -am "Update submodules"
    $ git submodule update --init --recursive
    
## Options

By default, Kirby Paperback Export will include the text from the title and description fields for every page on your Kirby site, including invisible pages. The following options allow you to select and filter which pages are included.

```php
// Include invisible pages
c::set('paperback.include.invisible', true);

// Include only the children of a specific page
c::set('paperback.include.children', []);

// Exclude specific templates
c::set('paperback.exclude.template', []);
```

## Known Issues

+ Exported content is not timestamped or versioned
+ Linebreaks surrounding headings are collapsed so text blocks are mashed together
+ Output is currently optimized for the [Newton Glossary](http://newtonglossary.com/) instance of [Kirby](https://getkirby.com/)

## Release Notes

### 1.0.1
+ Refactored filtering options
+ Fixed formatting of paragraph breaks in `$page->text()`

### 1.0.0
+ Initial release

## Acknowledgements

A tip of the hat to [Pedro Borges](https://pedroborg.es/) and his [Kirby XML Sitemap](https://github.com/pedroborges/kirby-xml-sitemap) for providing the necessary framework and inspiration to attempt my own plugin.

## License

Copyright © 2017 Grant Hutchinson

This project is licensed under the short and sweet [MIT License](http://opensource.org/licenses/MIT). This license allows you to do anything pretty much anything you want with the contents of the repository, as long as you provide proper attribution and don’t hold anyone liable.

See the [license.txt](https://raw.github.com/splorp/kirby-paperback-export/master/license.txt) file included in this repository for further details.

## Questions?

Contact me via [email](mailto:grant@splorp.com) or [Twitter](https://twitter.com/splorp).
