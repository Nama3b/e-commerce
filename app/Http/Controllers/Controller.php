<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Delivery;
use App\Models\Image;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\Shipping;
use App\Models\Tag;
use App\Support\ApiResponsesJson;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ApiResponsesJson, DispatchesJobs, ValidatesRequests, HandleJsonResponses, HandleComponentError, WithPaginationLimit;

    const INSTANCE_DATA_TABLE = [
        'permission' => [
            'datatable' => 'App\DataTables\User\PermissionDataTable',
            'role_create' => Permission::CREATE,
        ],
        'role' => [
            'datatable' => 'App\DataTables\User\RoleDataTable',
            'role_create' => Role::CREATE,
        ],
        'delivery' => [
            'datatable' => 'App\DataTables\Delivery\DeliveryDataTable',
            'role_create' => Delivery::CREATE,
        ],
        'shipping' => [
            'datatable' => 'App\DataTables\Delivery\ShippingDataTable',
            'role_create' => Shipping::CREATE,
        ],
        'order' => [
            'datatable' => 'App\DataTables\Order\OrderDataTable',
            'role_create' => Order::CREATE,
        ],
        'order_detail' => [
            'datatable' => 'App\DataTables\Order\OrderDetailDataTable',
            'role_create' => OrderDetail::CREATE,
        ],
        'post' => [
            'datatable' => 'App\DataTables\Post\PostDataTable',
            'role_create' => Post::CREATE,
        ],
        'brand' => [
            'datatable' => 'App\DataTables\Product\BrandDataTable',
            'role_create' => Brand::CREATE,
        ],
        'product_category' => [
            'datatable' => 'App\DataTables\Product\ProductCategoryDataTable',
            'role_create' => ProductCategory::CREATE,
        ],
        'product' => [
            'datatable' => 'App\DataTables\Product\ProductDataTable',
            'role_create' => Product::CREATE,
        ],
        'customer' => [
            'datatable' => 'App\DataTables\User\CustomerDataTable',
            'role_create' => Customer::CREATE,
        ],
        'member' => [
            'datatable' => 'App\DataTables\User\MemberDataTable',
            'role_create' => Member::CREATE,
        ],
        'comment' => [
            'datatable' => 'App\DataTables\Resource\CommentDataTable',
            'role_create' => Comment::CREATE,
        ],
        'tag' => [
            'datatable' => 'App\DataTables\Resource\TagDataTable',
            'role_create' => Tag::CREATE,
        ],
        'image' => [
            'datatable' => 'App\DataTables\Resource\ImageDataTable',
            'role_create' => Image::CREATE,
        ],
    ];

    /**
     * @param $request
     * @return array
     */
    protected function buildInstance($request): array
    {
        return [
            self::INSTANCE_DATA_TABLE [$request->route()->getName()]['datatable'],
            __('generate.' . $request->route()->getName() . '.filter'),
            __('generate.' . $request->route()->getName() . '.editor'),
            __('generate.' . $request->route()->getName() . '.modal_size'),
            Gate::allows(self::INSTANCE_DATA_TABLE [$request->route()->getName()]['role_create'])
        ];
    }

    /**
     * @param $data
     * @param string $message
     * @return array
     */
    public function success($data = null, string $message = ''): array
    {
        return (['status' => 'success', 'data' => $data, 'message' => $message]);
    }

    /**
     * @param string $message
     * @return array
     */
    public function error(string $message = ''): array
    {
        $message = empty($message) ? $message = __('string.error_response_default') : $message;
        return (['status' => 'error', 'message' => $message]);
    }

    /**
     * @return string[]
     */
    public function unauth(): array
    {
        return (['status' => 'unauth']);
    }

    /**
     * Make API call with exception handling.
     * This allows to gracefully catch all possible exceptions and handle them properly.
     *
     * @param $callback
     *
     * @return mixed
     */
    protected function withErrorHandling($callback): mixed
    {
        try {
            return $callback();
        } catch (Exception $exception) {
            return $this->resMessage(__('An unexpected error occurred. Please try again later.'), 500);
        }
    }

    /**
     * @param $callback
     * @return mixed
     */
    protected function withErrorNotFound($callback): mixed
    {
        try {
            return $callback();
        } catch (ModelNotFoundException $e) {
            return $this->resMessage(__("response.data_not_exist"), 404);
        } catch (Exception $e) {
            return $this->message($e->getMessage())
                ->respondBadRequest();
        }
    }
}
