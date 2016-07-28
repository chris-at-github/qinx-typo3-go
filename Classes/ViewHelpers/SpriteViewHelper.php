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

	const FILE_INLINE = 'inline'; // Special file value to identify inline SVG sprites.

	/**
	 * TYPO3's configuration manager
	 *
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * Render a SVG sprite.
	 *
	 * @see https://css-tricks.com/svg-sprites-use-better-icon-fonts/
	 *
	 * @param string $symbol The sprite symbol
	 * @return string
	 */
	public function render($symbol) {
		$settings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'qxgo');

		$file = 'fileadmin/Resources/Public/Images/icons.svg';
		if(empty($settings['spriteFile']) === false) {
			$file = \TYPO3\CMS\Core\Utility\PathUtility::getAbsoluteWebPath($settings['spriteFile']);
		}

		$url = $file . '#' . $symbol;

		$output = <<<EOT
<svg xmlns="http://www.w3.org/2000/svg" class="sprite sprite-{$symbol}" preserveAspectRatio="xMinYMin meet" viewbox="0 0 180 51">
	<use xlink:href="{$url}" />
</svg>
EOT;

		return $output;
	}

}
