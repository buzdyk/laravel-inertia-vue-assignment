<?php

namespace App\Enums;

enum NannyBookingStatus: string
{
    case DRAFT = 'draft';
    case LOOKING_FOR_NANNY = 'looking-for-nanny';
    case SCHEDULED = 'scheduled';
    case COMPLETED = 'completed';
}
