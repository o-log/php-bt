<?php
/**
 * Created by PhpStorm.
 * User: ologinov
 * Date: 12.05.16
 * Time: 21:52
 */

namespace OLOG\BT;


use OLOG\ConfWrapper;

class Layout
{
	static public function render($content_html, $action_obj = null)
	{

		$layout_theme = ConfWrapper::getOptionalValue('php-bt.layout_class_name', LayoutBootstrap::class);
		\OLOG\Assert::assert(is_callable([$layout_theme, 'render'], false), 'Функция render отсутствует в классе');
		$layout_theme::render($content_html, $action_obj);

	}
}