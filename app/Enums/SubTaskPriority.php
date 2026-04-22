<?php

namespace App\Enums;

enum SubTaskPriority: string
{
    case INICIAL = 'initial';
    case DESENVOLVIMENTO = 'developing';
    case FINALIZADO = 'finished';
}
