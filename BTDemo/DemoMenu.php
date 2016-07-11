<?php

namespace BTDemo;

use OLOG\BT;

class DemoMenu implements BT\InterfaceMenu
{
    static public function menuArr(){
        return [
            new BT\MenuItem('123', '/'),
            new BT\MenuItem('234', '', [
                new BT\MenuItem('345', '/2'),
                new BT\MenuItem('456', '/3')
            ]),
            new BT\MenuItem('567', '', [
                new BT\MenuItem('678', '/4'),
                new BT\MenuItem('789', '/5')
            ])
        ];
    }


}