<?php
function renderIcon($name, $class = '')
{
  $path = APPPATH . 'Views/components/icons/' . $name . '.svg';

  if (file_exists($path)) {
    $svg = file_get_contents($path);

    // Add class to the <svg> tag dynamically
    if (!empty($class)) {
      $svg = preg_replace('/<svg /', '<svg class="' . $class . '" ', $svg, 1);
    }

    echo $svg;
  } else {
    echo '<!-- Icon not found: ' . $name . ' -->';
  }
}
