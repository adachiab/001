<?php
class AppController {
  function get_include_contents($filename, $args = array()) {
      extract($args);
      if (is_file($filename)) {
          ob_start();
          include $filename;
          return ob_get_clean();
      }
      return false;
  }



}
