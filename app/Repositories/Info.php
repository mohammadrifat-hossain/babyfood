<?php

// namespace App\Repositories;

use App\Models\Settings;

class Info {
    // Site Info
    public static function Settings($group, $name){
        $q = Settings::where('group', $group)->where('name', $name)->first();

        // Null Check
        if ($q){
            return $q->value;
        }else{
            return null;
        }
    }

    // Site Info by Group
    public static function SettingsGroup($group){
        return Settings::where('group', $group)->get();
    }

    // Site Info by Keys
    public static function SettingsGroupKey($group = 'general'){
        $query = Settings::where('group', $group)->get();

        // Generate Output
        $output = [];
        foreach($query as $data){
            if($data->name == 'logo' || $data->name == 'footer_logo' || $data->name == 'favicon' || $data->name == 'og_image' || $data->name == 'pm_image' || $data->name == 'homepage_banner_image'){
                $output[$data->name] = asset('uploads/info/' . $data->value);
            }else{
                $output[$data->name] = $data->value;
            }
        }

        // // Return Default
        // foreach($keys as $key){
        //     if(!isset($output[$key])){
        //         $output[$key] = null;
        //     }
        // }

        return $output;
    }

    // Tax Calculation
    public static function tax($amount){
        $tax = (new static)->Settings('general', 'tax');
        $tax_type = (new static)->Settings('general', 'tax_type');

        if($tax_type == 'Percent'){
            return ($amount * $tax) / 100;
        }

        return $tax;
    }
}

function settings($group, $name){
    return Info::Settings($group, $name);
}

function amount($amount){
    return number_format($amount, 2);
}
