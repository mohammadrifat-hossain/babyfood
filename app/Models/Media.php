<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    // Paths
    public function getPathsAttribute(){
        $year_month = $this->year . '/' . $this->month;
        $file_name = $this->file_name;

        $prefix_extension = env('APP_IMAGE_WEBP') ? '.webp' : '';

        $output['original'] = asset("uploads/$year_month/$file_name" . $prefix_extension);

        if(file_exists(public_path("uploads/$year_month/small_$file_name" . $prefix_extension))){
            $output['small'] = asset("uploads/$year_month/small_$file_name" . $prefix_extension);
        }else{
            $output['small'] = asset('img/no-image.png');
        }
        if(file_exists(public_path("uploads/$year_month/medium_$file_name" . $prefix_extension))){
        $output['medium'] = asset("uploads/$year_month/medium_$file_name" . $prefix_extension);
        }else{
            $output['medium'] = asset('img/no-image.png');
        }
        if(file_exists(public_path("uploads/$year_month/large_$file_name" . $prefix_extension))){
            $output['large'] = asset("uploads/$year_month/large_$file_name" . $prefix_extension);
        }else{
            $output['large'] = asset('img/no-image.png');
        }

        return $output;
    }
}
