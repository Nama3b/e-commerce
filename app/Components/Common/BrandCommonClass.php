<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class BrandCommonClass
{

    use WithPaginationLimit;

    /**
     * The creating target request instance.
     *
     */
    protected FormRequest $request;

    /**
     * Create new request instance.
     */
    public function __construct(FormRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @param bool $edit
     * @param $brand
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $brand = null): array
    {
        return [
            'name' => $this->makeField($brand, $edit, 'name'),
        ];
    }

    /**
     * @param $brand
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($brand, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $brand->{$fil} :
            $this->request->input($fil);
    }

    /**
     * @param string $fil
     * @return bool
     */
    private function existField(string $fil = ''): bool
    {
        return $this->request->filled($fil);
    }

}
