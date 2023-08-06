<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\Cart
 *
 * @property int $id
 * @property int $customer_id
 * @property int $product_id
 * @property int $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Customer $customers
 * @property-read Product $products
 * @method static Builder|Cart newModelQuery()
 * @method static Builder|Cart newQuery()
 * @method static Builder|Cart query()
 * @method static Builder|Cart whereCreatedAt($value)
 * @method static Builder|Cart whereCustomerId($value)
 * @method static Builder|Cart whereId($value)
 * @method static Builder|Cart whereProductId($value)
 * @method static Builder|Cart whereQuantity($value)
 * @method static Builder|Cart whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Cart extends Model
{
    use HasFactory;

    const CREATE = 'CREATE_CART';
    const VIEW = 'VIEW_CART';
    const EDIT = 'EDIT_CART';
    const DELETE = 'DELETE_CART';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
    ];

    /**
     * @return BelongsTo
     */
    public function customers(): BelongsTo
    {
        return $this->BelongsTo(Customer::class, 'customer_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function products(): BelongsTo
    {
        return $this->BelongsTo(Product::class, 'product_id', 'id');
    }
}
