<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package   NC Module Text And Image
 * @author    Marcel Mathias Nolte
 * @copyright Marcel Mathias Nolte 2015
 * @website	  https://www.noltecomputer.com
 * @license   <marcel.nolte@noltecomputer.de> wrote this file. As long as you retain this notice you
 *            can do whatever you want with this stuff. If we meet some day, and you think this stuff 
 *            is worth it, you can buy me a beer in return. Meanwhile you can provide a link to my
 *            homepage, if you want, or send me a postcard. Be creative! Marcel Mathias Nolte
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'NC',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'NC\\ModuleNcText'  => 'system/modules/nc_mod_text_image/modules/ModuleNcText.php',
	'NC\\ModuleNcImage' => 'system/modules/nc_mod_text_image/modules/ModuleNcImage.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_text'          => 'system/modules/nc_mod_text_image/templates/modules',
	'mod_image'         => 'system/modules/nc_mod_text_image/templates/modules'
));