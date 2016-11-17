<?php
$config = array (
  'Authake' =>
  array (
    'useDefaultLayout' => '1',
    'baseUrl' => '/',
    'service' => 'Authake',
    'loginAction' =>
    array (
      'controller' => 'user',
      'action' => 'login',
      'admin' => 0,
      'named' =>
      array (
      ),
      'pass' =>
      array (
      ),
    ),
    'loggedAction' => '/',
    'sessionTimeout' => '604800',
    'defaultDeniedAction' =>
    array (
      'controller' => 'user',
      'action' => 'denied',
      'admin' => 0,
      'named' =>
      array (
      ),
      'pass' =>
      array (
      ),
    ),
    'rulesCacheTimeout' => '300',
    'systemEmail' => 'admin@inspirelectronics.com ',
    'systemReplyTo' => 'admin@inspirelectronics.com ',
    'passwordVerify' => '1',
    'registration' => '1',
    'defaultGroup' => '2',
    'useEmailAsUsername' => '0',
  ),
);
