<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Info;
use View;

class Controller extends BaseController
{
    public function __construct() {
        $data = cache()->remember('general_settings', (60 * 60 * 24 * 90), function()
        {
            return Info::SettingsGroupKey('general');
        });
        View::share ('settings_g', $data);
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
