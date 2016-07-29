<?php
namespace Qinx\Qxgo\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Christian Pschorr <hello@qinx.me>, Qinx
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * View helper to render a SVG sprite icon.
 */
class SpriteViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * TYPO3's configuration manager
	 *
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * Initialize arguments.
	 *
	 * @return void
	 */
	public function initializeArguments() {
		$this->registerArgument('width', 'int', 'optional width for viewbox attribute', false, 0);
		$this->registerArgument('height', 'int', 'optional height for viewbox attribute', false, 0);

		parent::initializeArguments();
	}

	/**
	 * Render a SVG sprite.
	 *
	 * @see https://css-tricks.com/svg-sprites-use-better-icon-fonts/
	 *
	 * @param string $symbol The sprite symbol
	 * @return string
	 */
	public function render($symbol) {
		$width		= 0;
		$height		= 0;
		$settings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'qxgo');

		$file = 'fileadmin/Resources/Public/Images/icons.svg';
		if(empty($settings['spriteFile']) === false) {
			$file = \TYPO3\CMS\Core\Utility\PathUtility::getAbsoluteWebPath($settings['spriteFile']);
		}

		$url = $file . '#' . $symbol;

		// Width and height are given from view helper attributes
		if(empty($this->arguments['width']) === false && empty($this->arguments['height']) === false) {
			$width 	= (int) $this->arguments['width'];
			$height = (int) $this->arguments['height'];
		}

		if(empty($width) === false && empty($height) === false) {
			$viewbox = 'viewbox="0 0 ' . $width . ' ' . $height . '"';
		}

		$output = <<<EOT
<svg xmlns="http://www.w3.org/2000/svg" class="svg-sprite svg-sprite--{$symbol}" preserveAspectRatio="xMinYMin meet" {$viewbox}>
	<use xlink:href="{$url}" />
</svg>
EOT;

		return $output;
	}

}
