<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

// Register extension as provider for FCEs.
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Content');