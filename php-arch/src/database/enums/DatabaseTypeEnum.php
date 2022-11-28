<?php

namespace Mathleite\PhpArch\database\enums;

enum DatabaseTypeEnum: string
{
    case MEMORY = 'memory';
    case NOSQL = 'nosql';
    case SQL = 'sql';
}
