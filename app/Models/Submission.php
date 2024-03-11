<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submission extends Model
{
    use HasFactory;

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class);
    }

    public function getCreatedAtFormatAttribute()
    {
        $carbonDate = Carbon::parse($this->created_at);

        return $carbonDate->format('d/m/Y H:i');
    }

    public function getInsuranceProductFormatAttribute()
    {
        return ucwords(strtolower(str_replace('_', ' ', $this->insurance_product )));
    }
}
