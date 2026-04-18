<?php

namespace App\Enums;

enum SubTask: string
    {
    case PENDENTE = 'pendente';
    case EMANDAMENTO = 'em andamento';
    case FINALIZADO = 'finalizado'; 
}