<?php

namespace OLOG\BT;

use OLOG\ConfWrapper;

class Layout
{
	static public function render($content_html, $action_obj = null)
	{

		$layout_theme = ConfWrapper::getOptionalValue(\OLOG\BT\BTConstants::MODULE_NAME . '.layout_class_name', LayoutBootstrap::class);
		\OLOG\Assert::assert(is_callable([$layout_theme, 'render'], false), 'Функция render отсутствует в классе');
		$layout_theme::render($content_html, $action_obj);

	}
}