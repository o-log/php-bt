<?php
namespace OLOG\BT;

interface InterfaceTopActionObj
{
    // возвращает объект вышестоящего экшена для крошек или нулл
    public function topActionObj();
}