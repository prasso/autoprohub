<?php

namespace Prasso\AutoProHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Team;

class Customer extends AutoProHubModel
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aph_customers';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'team_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'status',
        'preferences',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'preferences' => 'json',
    ];
    
    /**
     * Get the team that owns the customer.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
