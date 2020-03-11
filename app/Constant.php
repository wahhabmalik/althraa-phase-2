<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Constant extends Model
{
    use LogsActivity;

    protected $table = 'constants';

	protected $primaryKey = 'constant_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'constant_meta_type', 'constant_attribute', 'constant_value', 'constant_symbol', 
    ];

    // ---------------------------------------------------------
    // log attributes
    // ---------------------------------------------------------
    protected static $logAttributes = [
        'constant_meta_type', 'constant_attribute', 'constant_value', 'constant_symbol', 
    ];

    // protected static $logOnlyDirty = true;


    // getters and setters
    public function getConstantAttributeAttribute($value)
    {
        return ucwords(str_replace("_", " ", $value));
    }

    public function getConstantMetaTypeAttribute($value)
    {
        return ucwords(str_replace("_", " ", $value));
    }
}
