<?php

namespace App\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use GeneratesUuid;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'requirements',
        'type',
        'owner_id'
    ];

    /**
     * Retrieves the Guild's owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner() {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Retrieves the Guild's members
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members() {
        return $this->hasMany('App\User');
    }

    /**
     * Gets the requirements column and converts it to an object
     *
     * @return \stdClass
     */
    public function getRequirementsAttribute() {
        return json_decode($this->attributes['requirements']);
    }

    /**
     * Sets the requirements column
     *
     * @param array|\stdClass|string $value
     */
    public function setRequirementsAttribute($value) {
        if (is_string($value)) $this->attributes['requirements'] = $value;
        else $this->attributes['requirements'] = json_encode($value);
    }

    /**
     * Get the requirements column and format it to an array
     *
     * @return array
     */
    public function getRequirementsTextAttribute() {
        $requirementsArr = [];
        foreach ($this->requirements as $requirement) {
            if (!empty($requirement->quantity) || $requirement->quantity > 0) $requirementsArr[] = $requirement->quantity . ' '
                . $requirement->requirement
                . ($requirement->quantity > 1 ? 's' : '')
                . (!empty($requirement->interval) ? " " . $requirement->interval : '');
        }
        return $requirementsArr;
    }

    /**
     * Get the description column and replace newline chars with <br/>
     *
     * @return array
     */
    public function getDescriptionAttribute() {
        return nl2br($this->attributes['description']);
    }
}
