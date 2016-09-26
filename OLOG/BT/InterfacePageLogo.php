<?php

namespace OLOG\BT;

/**
 * Интерфейс для получения лого страницы
 */
interface InterfacePageLogo
{
    /**
     * Возвращает html строку, содержащую лого страницы
     * @return string
     */
    public function getLogoImg();
}