<?php

namespace  App\Enums;

enum UsersRole:string
{
    case ADMIN = 'ADMIN';
    case EDITOR = 'EDITOR';
    case USER = 'USER';
}
