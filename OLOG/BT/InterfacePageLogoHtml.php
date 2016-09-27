<?php

namespace OLOG\BT;

/**
 * Интерфейс для получения лого страницы
 */
interface IntefacePageLogoHtml
{
    /**
     * Возвращает html строку, содержащую лого страницы
     * @return string
     */
    public function pageLogoHtml();
}