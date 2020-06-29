<?php

// namespace App\Helpers;

if (!function_exists('human_file_size')) {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
    function human_file_size($bytes, $decimals = 2)
    {
        $sz = 'BKMGTPE';
        $factor = (int)floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $sz[$factor];
 
    }
}
 
if (!function_exists('in_arrayi')) {
 
    /**
     * Checks if a value exists in an array in a case-insensitive manner
     *
     * @param mixed $needle
     * The searched value
     *
     * @param $haystack
     * The array
     *
     * @param bool $strict [optional]
     * If set to true type of needle will also be matched
     *
     * @return bool true if needle is found in the array,
     * false otherwise
     */
    function in_arrayi($needle, $haystack, $strict = false)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack), $strict);
    }
}


/*
| --------------------------------
| -------- Maintenance Mode ------
| --------------------------------
*/
function maintenanceSettings()
{
    return \App\SiteManagement::whereIn('meta_key', ['maintenance_heading', 'maintenance_description', 'maintenance_image', 'maintenance_mode'])->get();
}

function maintenanceMode()
{
    return \App\SiteManagement::where('meta_key', 'maintenance_mode')->first();
}

function maintenancePageHeading()
{
    return \App\SiteManagement::where('meta_key', 'maintenance_heading')->first();
}

function maintenancePageDescription()
{
    return \App\SiteManagement::where('meta_key', 'maintenance_description')->first();
}

function maintenancePageImage()
{
    return \App\SiteManagement::where('meta_key', 'maintenance_image')->first();
}

/*
| --------------------------------
| -------- General Application Settings ------
| --------------------------------
*/
// ------------ site title ------------------
function althraa_site_title()
{
    $site_title = \App\SiteManagement::where('meta_key', 'title')->first();
    return $site_title->meta_value ?? config('app.name', 'Althraa');
}

// -------------- site decription ----------------
function althraa_site_description()
{
    $site_description = \App\SiteManagement::where('meta_key', 'description')->first();
    return $site_description->meta_value ?? 'Thokhor helps you build your wealth';
}

function althraa_site_description_ar()
{
    $site_description = \App\SiteManagement::where('meta_key', 'description_ar')->first();
    return $site_description->meta_value ?? 'Thokhor helps you build your wealth';
}

// ------------- site logo -----------------
function althraa_logo()
{
    $logo = \App\SiteManagement::where('meta_key', 'logo')->first();
    return ($logo) ? url('/').'/'.$logo->meta_value : url('/').'backend_assets/site_assets/images/logo/logo.png';
}

// ------------- site favicon -----------------
function althraa_favicon()
{
    $favicon = \App\SiteManagement::where('meta_key', 'favicon')->first();
    return ($favicon) ? url('/').'/'.$favicon->meta_value : url('/').'backend_assets/site_assets/images/favicon/althraa_favicon.png';
}

/*
| --------------------------------
| -------- General Application Settings ------
| --------------------------------
*/
// -----------------------------
function loggedInUser()
{
    if (auth()->user())
        return auth()->user();
    return null;
}

function currency($value, $currency = 1)
{
    if($value == null)
        return '';
    else if(($value) && $currency == 0)
    // else if(is_numeric($value) && $currency == 0)
        return number_format($value, 0);
    
    if(($value) && $currency == 1)
    // if(is_numeric($value) && $currency == 1)
        return 'SAR ' . number_format($value, 0);
    else
        return 0;
}


function percentage($value, $no_sign = 0)
{
    if($no_sign)   
        return round($value, 0);
    return round($value, 0) . ' %';
}

// -----------------------------
function loggedInUserRole()
{
    if (!loggedInUser()){
        return false;
    }else{
        if (loggedInUser()->hasRole('admin'))
            return Spatie\Permission\Models\Role::findByName('admin') ?? false;
        if (loggedInUser()->hasRole('moderator'))
            return Spatie\Permission\Models\Role::findByName('moderator') ?? false;
        if (loggedInUser()->hasRole('user'))
            return Spatie\Permission\Models\Role::findByName('user') ?? false;
    }
}


if ( ! function_exists( 'generatePDF' ) ) {
    function generatePDF($view, $viewData, $fileName, $file = false )
    {
        try {
            
            $filePath = storage_path($fileName); // need to save file in storage path

            $pdf = \PDF::loadView($view, $viewData);
            $pdf->setPaper('a4', 'landscape');
            $pdf->save($filePath);
            // return $pdf->download('report.pdf');
            $content = file_get_contents($filePath); // fetch content and to send to FE

            unlink($filePath); // delete file once saved and content fetched

            return ["data" => ["file_content" => utf8_encode($content), 'file_name' => $fileName]];

        } catch ( \Exception $exception) {
            return ['message' => $exception->getMessage()];
        }
    }
}


// Custom Helpers for unique string
if (!function_exists('unique_string')) {
    /**
     * Generate Unique String with Model
     *
     * @param $condition
     * @param $value
     * @return null
     */
    function unique_string($table,$key, $length)
    {   
        $unique_id = \Illuminate\Support\Str::random($length);
        $d = \DB::table($table)->where($key,$unique_id)->first();
        if($d){
            $this->unique_string($table,$key,$length);
        }else{
            return $unique_id;
        }

    }
}