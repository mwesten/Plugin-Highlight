Plugin-Highlight
================

Statamic plugin that adds [Highlight.js](http://softwaremaniacs.org/soft/highlight/en) v 7.0 code highlighting to your site.


# Installation
## Copy the files to their destination
Download or clone this project on your system.
Add the contents of the folder to the `_add-ons/highlight` folder.

## Add the highlight init code to your head
Open the theme file layout (for example) `_themes/london-wild/layouts/default.html`
Add the following code in your `<head>` section:

    {{ highlight:head }}

This displays the highlight.js in the default theme.
You can also select one of the added themes that you can find in the `_add-ons/highlight/highlight/styles` folder; for example the Sunburst theme:

    {{ highlight:head style="sunburst"}}


# Usage

When codeblocks are used (1 tab or 4 spaces) Highlight.js tries to guess what code is used. (You can inspect the class on the generated `<pre><code class="php"> … </code></pre>` codeblock to see how it was interpreted.)
If the autodetection didn't work out correctly or you just want control over the rendering, just wrap the code in a manual codeblock and add the language to the code class.
See for more information the [Highlight.js documentation](http://softwaremaniacs.org/soft/highlight/en/description).


# Disclaimer
I've 'written' this plugin for my own use. It comes without any guarantee, so your mileage may vary in using it. If you find bugs or have great additions you'd like to share, use github to fork the project and share your improvements by initiating pull requests.