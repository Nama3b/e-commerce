<?php

namespace App\Models;

use   Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property int $role_id
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $full_name
 * @property string $address
 * @property string $phone_number
 * @property string|null $birthday
 * @property string|null $image
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Comment> $comments
 * @property-read int|null $comments_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Order> $orders
 * @property-read int|null $orders_count
 * @property-read Collection<int, Post> $posts
 * @property-read int|null $posts_count
 * @method static Builder|Customer newModelQuery()
 * @method static Builder|Customer newQuery()
 * @method static Builder|Customer onlyTrashed()
 * @method static Builder|Customer query()
 * @method static Builder|Customer whereAddress($value)
 * @method static Builder|Customer whereBirthday($value)
 * @method static Builder|Customer whereCreatedAt($value)
 * @method static Builder|Customer whereDeletedAt($value)
 * @method static Builder|Customer whereEmail($value)
 * @method static Builder|Customer whereEmailVerifiedAt($value)
 * @method static Builder|Customer whereFullName($value)
 * @method static Builder|Customer whereId($value)
 * @method static Builder|Customer whereImage($value)
 * @method static Builder|Customer wherePassword($value)
 * @method static Builder|Customer wherePhoneNumber($value)
 * @method static Builder|Customer whereRoleId($value)
 * @method static Builder|Customer whereStatus($value)
 * @method static Builder|Customer whereUpdatedAt($value)
 * @method static Builder|Customer withTrashed()
 * @method static Builder|Customer withoutTrashed()
 * @mixin Eloquent
 */
class Customer extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, SoftDeletes, Notifiable;

    const CREATE = 'CREATE_CUSTOMER';
    const VIEW = 'VIEW_CUSTOMER';
    const EDIT = 'EDIT_CUSTOMER';
    const DELETE = 'DELETE_CUSTOMER';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'email',
        'email_verified_at',
        'password',
        'full_name',
        'address',
        'phone_number',
        'birthday',
        'image',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->HasMany(Post::class,'author','id');
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->HasMany(Order::class, 'customer_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->HasMany(Comment::class, 'customer_id', 'id');
    }
}
