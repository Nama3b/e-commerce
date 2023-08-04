<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;



/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id
 * @property int $brand_id
 * @property int $creator
 * @property string $name
 * @property string|null $description
 * @property float $price
 * @property string $quantity
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Brand $brand
 * @property-read ProductCategory $category
 * @property-read Collection<int, Favorite> $favorites
 * @property-read int|null $favorites_count
 * @property-read Collection<int, Image> $images
 * @property-read int|null $images_count
 * @property-read Member $member
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product onlyTrashed()
 * @method static Builder|Product query()
 * @method static Builder|Product whereBrandId($value)
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereCreator($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereQuantity($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product withTrashed()
 * @method static Builder|Product withoutTrashed()
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS = ['WAITING', 'STOCKOUT', 'STOCKING', 'BANNED'];
    const CREATE = 'CREATE_PRODUCT';
    const VIEW = 'VIEW_PRODUCT';
    const EDIT = 'EDIT_PRODUCT';
    const DELETE = 'DELETE_PRODUCT';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'brand_id',
        'creator',
        'name',
        'description',
        'price',
        'quantity',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->BelongsTo(ProductCategory::class,'category_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->BelongsTo(Brand::class,'brand_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->BelongsTo(Member::class,'creator', 'id');
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->HasMany(Image::class, 'reference_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function favorites(): HasMany
    {
        return $this->HasMany(Favorite::class, 'reference_id', 'id');
    }
}
