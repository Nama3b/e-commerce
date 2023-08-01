<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\Favorite
 *
 * @property int $id
 * @property int $reference_id
 * @property int $customer_id
 * @property string $favorite_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Customer|null $customer
 * @method static Builder|Favorite newModelQuery()
 * @method static Builder|Favorite newQuery()
 * @method static Builder|Favorite onlyTrashed()
 * @method static Builder|Favorite query()
 * @method static Builder|Favorite whereCreatedAt($value)
 * @method static Builder|Favorite whereCustomerId($value)
 * @method static Builder|Favorite whereDeletedAt($value)
 * @method static Builder|Favorite whereType($value)
 * @method static Builder|Favorite whereId($value)
 * @method static Builder|Favorite whereReferenceId($value)
 * @method static Builder|Favorite whereUpdatedAt($value)
 * @method static Builder|Favorite withTrashed()
 * @method static Builder|Favorite withoutTrashed()
 * @mixin Eloquent
 */
class Favorite extends Model
{
    use HasFactory;

    const TYPE = ['PRODUCT', 'POST', 'COMMENT'];
    const CREATE = 'CREATE_FAVORITE';
    const VIEW = 'VIEW_FAVORITE';
    const EDIT = 'EDIT_FAVORITE';
    const DELETE = 'DELETE_FAVORITE';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'favorites';

    /**
     * @var string[]
     */
    protected $fillable = [
        'reference_id',
        'customer_id',
        'type',
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class,'customer_id', 'id');
    }
}
