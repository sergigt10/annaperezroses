<?php

    function translatePHP($value, $type) 
    {
        switch ( app()->getLocale() ) {
            case 'es':
                if($type === 'imatge'){
                    return $value->imatge2;
                }
                break;
            default:
                if($type === 'imatge'){
                    return $value->imatge1;
                }
        }
    }