<?php

namespace App\Enums;

enum SubTaskPriority: string
{
    case INITIAL = 'initial';
    case DEVELOPING = 'developing';
    case FINISHED = 'finished';
}
