<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('url:check {days}', function ($days) {
    $count = \App\ShortUrl::whereDate('created_at', '<=', \Carbon\Carbon::now()->subDays($days))->forceDelete();
    $this->comment('Complete. Delete url: '.$count);
})->describe('Display an inspiring quote');