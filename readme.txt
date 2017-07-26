=== Hide Links ===
Contributors: egolacrima, wppuzzle
Tags: link, hide link, links, noindex, comment author link
Donate link: http://avovkdesign.com/bymecoffee
Requires at least: 3.0
Tested up to: 4.8
Stable tag: 1.2
License: GPLv2 or later 

Closure of external links from indexing using jQuery script.

== Description ==

Hides external links from indexing by search engines using a jQuery masking links script([more about the method in] (http://avovkdesign.com/kak-spryatat-ssylku-ot-indeksacii.html "How to hide the link from Indexation"))

FEATURES:
* One click on editor button help to hide external links in search engine index
* Automatically disallows indexing of all commenter's links.
* Simple shortcode [link][/link] easily hides any links in widgets or comments texts.


= USAGE =

1. In text editor place cursor on link
1. Click on HideLinks button to add shortcode before and after link. Sample:
`[link]external link[/link]`


= TESTING =

After installing and activating plugin, hidden links look like ordinary ones. This moment can mislead and complicate work of plugin.

You can check whether plugin works correctly in two ways.
1. On page, where there are hidden link or user comments, press keyboard shortcuts Ctrl + U — new tab with source code opens.
1. Now press Ctrl + F on keyboard — field for text searching appears. Enter phrase in it data-link and press Enter on your keyboard.
1. Browser found in source code all matches with necessary phrase (it is present in hidden link). In search box to the right of entered phrase, inscription with number of found matches appears (i.e. hidden links), and near — arrows for transition to previous and next found fragment.
1. If in found fragment after phrase data-link goes link address you have hidden (or site address commentator) — it means that plugin hides link. Sample:
<code><span data-link="http://mylink.com" data-target="_blank" title="Title" class="link">anchor</span></code>
not like this:
<code><a href="http://mylink.com" target="_blank" title="Title" class="">anchor</a></code>


= PRO Features =

[HideLinks Pro](https://wp-puzzle.com/hide-links/) allow:

1. Automatically hide all external links in post content
2. Control script including (inline or file)

= Extra =
* Documentation [https://wp-puzzle.com/docs/ru/hide-links](https://wp-puzzle.com/docs/ru/hide-links)
* GitHub repository for issues and merge request [https://github.com/wppuzzle/hidelinks](https://github.com/wppuzzle/hidelinks)
* Support & bug report [https://wp-puzzle.com/our-support/](https://wp-puzzle.com/our-support/)

== Frequently Asked Questions ==

**Why hidden links are displayed as ordinary text?**
There are script errors on site and because of them code link substitution doesn’t work
In this case, you can try to disable all plugins except HideLinks and again check links – if on site page they have become clickable, then it means that error in scripts is caused by one of plugins. Try to activate plugins one by one, checking each time whether hidden link becomes ordinary text on page
If there is still a problem after deactivating plugins, it means that error can be caused by scripts from theme. In this case, you will need help of professional. In order to make sure that problem is in script error – you can contact technical support specifying site address.

**Зачем закрывать ссылки от индексации?**
Главная причина сокрытия ссылочной массы с сайта – это утечка веса.

**Почему бы просто не использовать `rel="nofollow"` для Google и `<noindex></noindex>` для Яндекс?**
Тег noindex (Яндекс) и атрибут nofollow (Google) не прячут ссылки от поисковиков, а только рекомендуют поисковым роботам не индексировать ссылки. Решение о индексации и учете этих ссылок принимается поиковой системой.

== Installation ==

= From your WordPress dashboard =
1. Visit *Plugins* &larr; *Add new*
1. Search for `Hide Links` and click *Install* button on HideLinks plugin
1. Activate HideLinks from your *Plugins* page.
1. Visit *Posts* &larr; *Add new* and find new button at visual editor


= From WordPress.org =
1. Download and unzip `hidelinks.zip`
1. Upload the `hidelinks` directory to your `/wp-content/plugins/` directory, using your favorite method (ftp, sftp, scp, etc…)
1. Activate HideLinks from your Plugins page.
1. Visit *Posts* &larr; *Add new* and find new button at visual editor

== Screenshots ==

1. HideLinks button in visual editor

== Changelog ==

= 1.2 =
* Tested up to WordPress 4.8
* Fix: problem with shortcode setup, when link is in begin or end of paragraph
* Add: do shortcodes in link text

= 1.1 =
* Added: visual editor button with which you can easily add or remove shortcode around link.

= 1.0.4 =
* Added: secure comment for script (in script)
* Added: commentator’s link replacement  which is displayed via get_comment_author_url_link

= 1.0.3 =
* Added: saving class attribute in script replacement, if there is any, for link

= 1.0.2 =
* Fixed: error with class setting for link of author’s comment

= 1.0.1 =
* Fixed: fatal error with setting class for tag span with picture inside
* Now in comment text and text widget you can use shortcode [link][/link] to close links, adding it around html – code of standard hyperlink

= 1.0 =
* Release

