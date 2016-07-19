<?php

namespace OLOG\BT;

class Layout
{
	static public function render($content_html, $action_obj = null)
	{
        //$layout_theme = ConfWrapper::getOptionalValue(\OLOG\BT\BTConstants::MODULE_NAME . '.layout_class_name', LayoutBootstrap::class);
        $layout_theme = BTConfig::getLayoutClassName();

		\OLOG\Assert::assert(is_callable([$layout_theme, 'render'], false), 'Функция render отсутствует в классе');
		$layout_theme::render($content_html, $action_obj);

	}
}