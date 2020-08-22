<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SiteManagement extends Model
{
    use LogsActivity;
    
	protected $table = 'site_managements';

	protected $primaryKey = 'site_management_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meta_key', 'meta_value',
    ];

    // log attributes
    protected static $logAttributes = ['meta_key', 'meta_value'];

    // protected static $logOnlyDirty = true;



    // -----------------------------------------------------------------
    // --------------------------- general settings 
    // -----------------------------------------------------------------
    public function general_settings()
    {
        $general = SiteManagement::whereIn('meta_key', ['title', 'description', 'description_ar', 'logo', 'favicon'])
                    ->get();
        return $general;
    }


    public function update_general_settings($general_settings_data = '')
    {
        // dd($general_settings_data, $this->getGeneralTitle());

        if ($this->getGeneralTitle()) {
            $this->getGeneralTitle()
                ->update([
                    'meta_value' => $general_settings_data['title'],
                ]);
        } else {
            SiteManagement::create([
                'meta_key' => 'title',
                'meta_value' => $general_settings_data['title'],
            ]);
        }

        if ($this->getGeneralDescription()) {
            $this->getGeneralDescription()
                ->update([
                    'meta_value' => $general_settings_data['description'],
                ]);
        } else {
            SiteManagement::create([
                'meta_key' => 'description',
                'meta_value' => $general_settings_data['description'],
            ]);
        }

        if ($this->getGeneralDescriptionAr()) {
            $this->getGeneralDescriptionAr()
                ->update([
                    'meta_value' => $general_settings_data['description_ar'],
                ]);
        } else {
            SiteManagement::create([
                'meta_key' => 'description',
                'meta_value' => $general_settings_data['description_ar'],
            ]);
        }

        return 1;
    }


    public function delete_general_settings()
    {
        return SiteManagement::whereIn('meta_key', ['title', 'description', 'logo', 'favicon'])->delete();
    }

    public function getGeneralTitle()
    {
        return SiteManagement::where('meta_key', 'title')->first();
    }

    public function getGeneralDescription()
    {
        return SiteManagement::where('meta_key', 'description')->first();
    }

    public function getGeneralDescriptionAr()
    {
        return SiteManagement::where('meta_key', 'description_ar')->first();
    }

    public function getGeneralLogo()
    {
        return SiteManagement::where('meta_key', 'logo')->first();
    }

    public function getGeneralFavicon()
    {
        return SiteManagement::where('meta_key', 'favicon')->first();
    }



    // -----------------------------------------------------------------
    // --------------------------- maintenance settings 
    // -----------------------------------------------------------------
    public function maintenance_settings()
    {
        $maintenance = SiteManagement::whereIn('meta_key', ['maintenance_heading', 'maintenance_description', 'maintenance_image'])
                        ->get();
        return $maintenance;
    }


    public function update_maintenance_settings($maintenance_settings_data = '')
    {
        // dd($maintenance_settings_data, $this->getMaintenanceMode());

        if ($this->getMaintenanceHeading()) {
            $this->getMaintenanceHeading()
                ->update([
                    'meta_value' => $maintenance_settings_data['maintenance_heading'],
                ]);
        } else {
            SiteManagement::create([
                'meta_key' => 'maintenance_heading',
                'meta_value' => $maintenance_settings_data['maintenance_heading'],
            ]);
        }

        if ($this->getMaintenanceDescription()) {
            $this->getMaintenanceDescription()
                ->update([
                    'meta_value' => $maintenance_settings_data['maintenance_description'],
                ]);
        } else {
            SiteManagement::create([
                'meta_key' => 'maintenance_description',
                'meta_value' => $maintenance_settings_data['maintenance_description'],
            ]);
        }

        if ($this->getMaintenanceDescriptionAR()) {
            $this->getMaintenanceDescriptionAR()
                ->update([
                    'meta_value' => $maintenance_settings_data['maintenance_description_ar'],
                ]);
        } else {
            SiteManagement::create([
                'meta_key' => 'maintenance_description_ar',
                'meta_value' => $maintenance_settings_data['maintenance_description_ar'],
            ]);
        }

        if (isset($maintenance_settings_data['maintenance_mode'])) {
            if ($this->getMaintenanceMode()) {
                $this->getMaintenanceMode()
                    ->update([
                        'meta_value' => $maintenance_settings_data['maintenance_mode'],
                    ]);
            } else {
                SiteManagement::create([
                    'meta_key' => 'maintenance_mode',
                    'meta_value' => $maintenance_settings_data['maintenance_mode'],
                ]);
            }
        } else {
            SiteManagement::where('meta_key', 'maintenance_mode')->delete();
        }
        

        return 1;
    }


    public function delete_maintenance_settings()
    {
        return SiteManagement::whereIn('meta_key', ['maintenance_heading', 'maintenance_description', 'maintenance_image', 'maintenance_mode'])->delete();
    }


    public function getMaintenanceHeading()
    {
        return SiteManagement::where('meta_key', 'maintenance_heading')->first();
    }

    public function getMaintenanceDescription()
    {
        return SiteManagement::where('meta_key', 'maintenance_description')->first();
    }

    public function getMaintenanceDescriptionAR()
    {
        return SiteManagement::where('meta_key', 'maintenance_description_ar')->first();
    }

    public function getMaintenanceImage()
    {
        return SiteManagement::where('meta_key', 'maintenance_image')->first();
    }

    public function getMaintenanceMode()
    {
        return SiteManagement::where('meta_key', 'maintenance_mode')->first();
    }
}
