<?php

if (!function_exists('icon')) {
  function icon(string $name): string
  {
    return view('/components/icons/' . $name);
  }
}
