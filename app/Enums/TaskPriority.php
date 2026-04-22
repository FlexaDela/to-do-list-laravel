<?php

namespace App\Enums;

enum TaskPriority: string
{
    case INITIAL = 'initial';
    case DEVELOPING = 'developing';
    case FINISHED = 'finished';
}
