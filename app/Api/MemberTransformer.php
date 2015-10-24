<?php namespace App\Api;


class MemberTransformer extends BaseTransformer
{

    /**
     * Transforming the single member data to json.
     *
     * @param $member
     * @return array
     */
    public function transform($member)
    {
        return $member;
    }
}