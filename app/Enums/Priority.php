<?php

namespace App\Enums;

enum Priority:string
{
    case BLOCKER = 'Blocker';

    case CRITICAL = 'Critical';

    case MAJOR = 'Major';

    case MINOR = 'Minor';

    case TRIVIAL = 'Trivial';
}
