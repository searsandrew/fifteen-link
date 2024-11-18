<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('domain-parser:refresh')->daily()->at('04:00');
