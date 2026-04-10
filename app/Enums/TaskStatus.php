<?php

namespace App\Enums;

enum TaskStatus: string
{
    case PENDENTE = 'pendente';
    case EMANDAMENTO = 'em andamento';
    case FINALIZADO = 'finalizado'; 
}