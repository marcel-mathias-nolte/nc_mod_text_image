<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Contao',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'Contao\ModuleText'                => 'system/modules/nc_mod_text_image/modules/ModuleText.php',
	'Contao\ModuleImage'               => 'system/modules/nc_mod_text_image/modules/ModuleImage.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_text'            => 'system/modules/nc_mod_text_image/templates/modules',
	'mod_image'           => 'system/modules/nc_mod_text_image/templates/modules'
));
