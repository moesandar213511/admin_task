<?php


namespace App\CustomClass;


use App\Member;

class MemberData
{

    private $id;
    private $member_data;

    function __construct($member_id) {
        $member=Member::findOrFail($member_id);
        $this->id=$member->id;
        $this->setMemberData($member);
    }

    /**
     * @return mixed
     */
    public function getMemberData()
    {
        $this->member_data['photo_url'] = Path::$domain_url . '/upload/member/' . $this->member_data['photo'];
        return $this->member_data;
    }

    /**
     * @param mixed $blog_data
     */
    private function setMemberData($member_data)
    {
        $this->member_data = $member_data;
    }

}