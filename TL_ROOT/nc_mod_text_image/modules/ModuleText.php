<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Contao;


/**
 * Front end content element "text".
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 */
class ModuleText extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_text';


	/**
	 * Display a login form
	 *
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			/*
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['login'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
			*/
		}

		return parent::generate();
	}
	
	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		/** @var \PageModel $objPage */
		global $objPage;

		// Clean the RTE output
		if ($objPage->outputFormat == 'xhtml')
		{
			$this->text = \StringUtil::toXhtml($this->text);
		}
		else
		{
			$this->text = \StringUtil::toHtml5($this->text);
		}

		// Add the static files URL to images
		if (TL_FILES_URL != '')
		{
			$path = \Config::get('uploadPath') . '/';
			$this->text = str_replace(' src="' . $path, ' src="' . TL_FILES_URL . $path, $this->text);
		}

		$this->Template->text = \StringUtil::encodeEmail($this->text);
		$this->Template->addImage = false;

		// Add an image
		if ($this->addImage && $this->singleSRC != '')
		{
			$objModel = \FilesModel::findByUuid($this->singleSRC);

			if ($objModel === null)
			{
				if (!\Validator::isUuid($this->singleSRC))
				{
					$this->Template->text = '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
				}
			}
			elseif (is_file(TL_ROOT . '/' . $objModel->path))
			{
				$this->singleSRC = $objModel->path;
				$this->addImageToTemplate($this->Template, $this->arrData);
			}
		}
	}
}
