<?php
/**
* Admin Routes configuration
* This file sets the admin routes for the application and must not be
* edited unless you do not intend to update your project [Not Recomended]
* as new great features might become available in the future.
* THIS SHOULD NOT BE EDITED BECAUSE IT WILL BE OVERWRITED ON UPDATE
*
* @copyright  Inspire Electronics (c) 2009 - 2016
* @since      IE-Admin v 1.0.0
* @licence    http://www.opensource.org/licenses/mit-license.php MIT License
*/
Router::connect('/admin', array('controller' => 'pages', 'action' => 'display', 'admin_home', 'admin' => true));
Router::connect('/login', array('controller' => 'user', 'action' => 'login'));
Router::connect('/logout', array('controller' => 'user', 'action' => 'logout'));
?>
