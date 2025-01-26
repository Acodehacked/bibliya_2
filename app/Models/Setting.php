<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['user_id', 'setting_key', 'setting_value'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSettingsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setSettingsAttribute($value)
    {
        $this->attributes['settings'] = json_encode($value);
    }

//     $user = User::find(1);
// $settings = $user->settings ?? [];
// $settings['theme'] = 'dark';
// $user->settings = $settings;
// $user->save();

// $theme = $user->settings()->where('setting_key', 'theme')->value('setting_value');

}
