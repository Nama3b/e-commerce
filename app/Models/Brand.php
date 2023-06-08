<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property string $thumbnail_image
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Product> $product
 * @property-read int|null $product_count
 * @method static Builder|Brand newModelQuery()
 * @method static Builder|Brand newQuery()
 * @method static Builder|Brand onlyTrashed()
 * @method static Builder|Brand query()
 * @method static Builder|Brand whereCreatedAt($value)
 * @method static Builder|Brand whereDeletedAt($value)
 * @method static Builder|Brand whereId($value)
 * @method static Builder|Brand whereName($value)
 * @method static Builder|Brand whereThumbnailImage($value)
 * @method static Builder|Brand whereStatus($value)
 * @method static Builder|Brand whereUpdatedAt($value)
 * @method static Builder|Brand withTrashed()
 * @method static Builder|Brand withoutTrashed()
 * @mixin Eloquent
 */
class Brand extends Model
{
    use HasFactory, SoftDeletes;

    const CREATE = 'CREATE_BRAND';
    const VIEW = 'VIEW_BRAND';
    const EDIT = 'EDIT_BRAND';
    const DELETE = 'DELETE_BRAND';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'thumbnail_image',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function product(): HasMany
    {
        return $this->HasMany(Product::class,'brand_id','id');
    }
}
