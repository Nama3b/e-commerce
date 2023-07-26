<?php

namespace App\Transformers\Post;

use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailMemberTransformer extends TransformerAbstract
{
    /**
     * @param Member $member
     * @return array
     */
    #[ArrayShape([])] public function transform(Member $member): array
    {
        return [
            'email' => $member->email,
            'full_name' => $member->full_name,
            'address' => $member->address,
            'phone_number' => $member->phone_number,
            'birthday' => $member->birthday,
            'image' => asset(Storage::url($member->image)),
            'status' => $member->status,
        ];
    }
}
