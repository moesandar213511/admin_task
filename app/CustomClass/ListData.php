<?php


namespace App\CustomClass;


use App\ListName;

class ListData
{

    private $id;
    private $list_data;

    function __construct($list_id)
    {
        $list = ListName::findOrFail($list_id);
        $this->id = $list->id;
        $this->setListData($list);
    }

    /**
     * @return mixed
     */
    public function getListData()
    {
        return $this->list_data;
    }

    /**
     * @param mixed $blog_data
     */
    private function setListData($list_data)
    {
        $this->list_data = $list_data;
    }

}