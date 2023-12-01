<?php

namespace App\Components;

use App\Support\WithFilterSupport;
use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Component
{
    use WithPaginationLimit, WithFilterSupport;

    /**
     * The creating target request instance.
     */
    protected Request|FormRequest $request;

    /**
     * Create new request instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

}
