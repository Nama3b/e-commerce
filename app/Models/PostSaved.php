<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\PostSaved
 *
 * @property int $id
 * @property int $reference_id
 * @property int $customer_id
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Customer $customer
 * @method static Builder|PostSaved newModelQuery()
 * @method static Builder|PostSaved newQuery()
 * @method static Builder|PostSaved query()
 * @method static Builder|PostSaved whereCreatedAt($value)
 * @method static Builder|PostSaved whereCustomerId($value)
 * @method static Builder|PostSaved whereId($value)
 * @method static Builder|PostSaved whereReferenceId($value)
 * @method static Builder|PostSaved whereType($value)
 * @method static Builder|PostSaved whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PostSaved extends Model
{
    use HasFactory;

    const TYPE = ['BLOG', 'NEWS'];
    const CREATE = 'CREATE_FAVORITE';
    const VIEW = 'VIEW_FAVORITE';
    const EDIT = 'EDIT_FAVORITE';
    const DELETE = 'DELETE_FAVORITE';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_saved';

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
