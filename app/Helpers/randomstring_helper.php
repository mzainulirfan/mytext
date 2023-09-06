<?php

if (!function_exists('getRandomString')) {
  /**
   * Generate a random string of a specified length.
   *
   * @param int $length Length of the random string
   * @return string Random string
   */
  function getRandomString($length)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }

    return $randomString;
  }
}
