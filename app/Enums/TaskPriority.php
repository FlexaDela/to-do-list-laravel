<?php

namespace App\Enums;

enum TaskPriority: string
{
    case INICIAL = 'initial';
    case DESENVOLVIMENTO = 'developing';
    case FINALIZADO = 'finished';
}
