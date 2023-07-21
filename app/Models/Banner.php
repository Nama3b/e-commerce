<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Banner
 *
 * @property int $id
 * @property string $name
 * @property string $thumbnail_image
 * @property int $sort_no
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Banner newModelQuery()
 * @method static Builder|Banner newQuery()
 * @method static Builder|Banner onlyTrashed()
 * @method static Builder|Banner query()
 * @method static Builder|Banner whereCreatedAt($value)
 * @method static Builder|Banner whereDeletedAt($value)
 * @method static Builder|Banner whereId($value)
 * @method static Builder|Banner whereName($value)
 * @method static Builder|Banner whereSortNo($value)
 * @method static Builder|Banner whereThumbnailImage($value)
 * @method static Builder|Banner whereType($value)
 * @method static Builder|Banner whereUpdatedAt($value)
 * @method static Builder|Banner withTrashed()
 * @method static Builder|Banner withoutTrashed()
 * @mixin Eloquent
 */
class Banner extends Model
{
    use HasFactory, SoftDeletes;

    const TYPE = ['SNEAKER', 'CLOTHES', 'WATCHES', 'ACCESSORY'];
    const CREATE = 'CREATE_BRAND';
    const VIEW = 'VIEW_BRAND';
    const EDIT = 'EDIT_BRAND';
    const DELETE = 'DELETE_BRAND';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banners';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
        'sort_no',
        'thumbnail_image',
    ];
}
