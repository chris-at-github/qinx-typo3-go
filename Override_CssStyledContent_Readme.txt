Override CssStyledContent

http://blog.schreibersebastian.de/2011/10/wo-sind-die-xclasses-bei-extbase-und-fluid/

public function render_textpic($content, $conf) {
	// Set the margin for image + text, no wrap always to avoid multiple stylesheets
	$noWrapMargin = (int)(($maxWInText ? $maxWInText : $fiftyPercentWidthInText) + (int)$this->cObj->stdWrap($conf['textMargin'], $conf['textMargin.']));
	$this->addPageStyle('.csc-textpic-intext-right-nowrap .csc-textpic-text', 'margin-right: ' . $noWrapMargin . 'px;');
	$this->addPageStyle('.csc-textpic-intext-left-nowrap .csc-textpic-text', 'margin-left: ' . $noWrapMargin . 'px;');
	// Beside Text where the image block width is not equal to maxW
	if ($contentPosition == 24 && $maxW != $imageBlockWidth) {
		$noWrapMargin = 500;// $imageBlockWidth + $textMargin;
		// Beside Text, Right
		if ($imagePosition == 1) {
			$this->addPageStyle('.csc-textpic-intext-right-nowrap-' . $noWrapMargin . ' .csc-textpic-text', 'margin-right: ' . $noWrapMargin . 'px;');
			$classes[] = 'csc-textpic-intext-right-nowrap-' . $noWrapMargin;
		} elseif ($imagePosition == 2) {
			$this->addPageStyle('.csc-textpic-intext-left-nowrap-' . $noWrapMargin . ' .csc-textpic-text', 'margin-left: ' . $noWrapMargin . 'px;');
			$classes[] = 'csc-textpic-intext-left-nowrap-' . $noWrapMargin;
		}
	}

	$output = str_replace('csc-textpic-intext-right-nowrap-280', 'csc-textpic-intext-right-nowrap-500', $output);
}