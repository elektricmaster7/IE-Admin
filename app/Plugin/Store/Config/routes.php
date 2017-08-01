<?php
  $language = array('language' => 'en|pt');
  Router::connect('/products', array('plugin' => 'store', 'controller' => 'products', 'action' => 'index'));
  Router::connect('/products/:action/*', array('plugin' => 'store', 'controller' => 'products'));

  Router::connect('/:language/products', array('plugin' => 'store', 'controller' => 'products', 'action' => 'index'), $language);
  Router::promote();
  Router::connect('/:language/products/:action/*', array('plugin' => 'store', 'controller' => 'products'), $language);
  Router::promote();
?>
