<?php

  class Plugin_highlight extends Plugin {

  var $meta = array(
  'name'       => 'Highlight',
  'version'    => '0.1',
  'author'     => 'Max Westen',
  'author_url' => 'http://dlmax.org'
  );

  function __construct() {
  parent::__construct();
  $this->site_root  = Statamic::get_site_root();
  $this->theme_root = Statamic::get_templates_path();

  $this->plugin_path = $this->getPluginPath();
  }


  /**
  * Enables the Highlight.js script to color-code codeblocks.
  * parameter: style (defaults to 'default') contains the name of the optional style (css filename without the '.css')
  * @return string
  */
  public function head()
  {
    $name = $this->fetch_param('style', 'default'); // Style name defaults to 'default'
    // Include the needed CSS for this plugin
    $style = $this->getPluginCss($name);

    // Include the needed javascript
    $js = '
    <script src="'.$this->plugin_path.'highlight/highlight.pack.js" type="text/javascript"> </script>
    <script type="text/javascript">
      hljs.initHighlightingOnLoad();
    </script>';

    return $style . $js;
  }



  /**
   * Loads the css file from the theme css folder if it exists, else uses the plugin version as fallback.
   * @return string
   */
  private function getPluginCss($style = 'default') {
    $plugincss = '/highlight/styles/'.$style.'.css';
    $csspath = $this->plugin_path.$plugincss;
    return '<link rel="stylesheet" href="'.$csspath.'">';
  }

  /**
   * Returns the path of this plugin folder.
   * @return string
   */
  private function getPluginPath() {
    $plugindir = basename(dirname(__FILE__));
    $parentdir = basename(dirname(dirname(__FILE__)));
    $pluginpath = Statamic_helper::reduce_double_slashes($this->site_root.'/'.$parentdir .'/' . $plugindir."/");

    return $pluginpath;
  }
}
