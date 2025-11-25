# Authors Index Plugin

This plugin adds a new page to OJS or OPS, where all authors with published articles are listed. \
When clicking in the name of an author, you're led to the search results of publications by the chosen author on the journal/server.

## Usage

The "Authors Index" page is allocated in the `/authors` path of the Journal or Preprint server. \
e.g.: `https://your-site.com/index.php/journalName/authors`

You can create a *Navigation Menu Item* to the new *Authors* page, so it can be accessed from the website's header. \
Make sure to add the new item as an *external link*, and pass the complete URL.

## Compatibility

The main branch of this repository is compatible with OJS 3.5.0.x.

A version compatible with OJS 3.4.0.x is available in the [stable-3_4_0](https://github.com/lepidus/authorsIndex/tree/stable-3_4_0) branch.

* Plugin version v0.x.x.x is compatible with OJS 3.4.0.x and OPS 3.4.0.x
* Plugin version v1.x.x.x is compatible with OJS 3.5.0.x and OPS 3.5.0.x

You can find the latest version of the plugin compatible with your OJS version in the [Releases page](https://github.com/lepidus/authorsIndex/releases)


## Plugin Download

To download the plugin, go to the Releases page and download the tar.gz package of the latest release compatible with your website.

## Installation

Enter the administration area of ​​your OJS website through the Dashboard.
Navigate to `Settings` > `Website` > `Plugins` > `Upload a new plugin`.

Under Upload file select the file `authorsIndex.tar.gz`.

Click Save and the plugin will be installed on your website.

## Credits

This plugin was sponsored by [Nordicbysight](https://nordicbysight.se/).
The list of authors was inspired by the one in OJS 2.4.

Developed by [Lepidus Tecnologia](https://github.com/lepidus).

## License

This plugin is licensed under the GNU General Public License v3.0

_Copyright (c) 2024 Lepidus Tecnologia_
