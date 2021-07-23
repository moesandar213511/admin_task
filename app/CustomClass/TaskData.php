<?php


namespace App\CustomClass;


use App\Task;
use App\ListName;
use App\Member;

class TaskData
{

    private $id;
    private $task_data;

    function __construct($task_id) {
        $task=Task::findOrFail($task_id);
        $this->id=$task->id;
        $this->setTaskData($task);
    }

    /**
     * @return mixed
     */
    public function getTaskData()
    {
        $list_id = $this->task_data['list_id'];
        $lists = ListName::where('id',$list_id)->get();
        $this->task_data['list_id'] = $lists['0']->name;
        
        $member_id = $this->task_data['user_id'];
        $members = Member::where('id',$member_id)->get();
         $this->task_data['user_id'] = $members['0']->name;

        return $this->task_data;
    }

    /**
     * @param mixed $blog_data
     */
    private function setTaskData($task_data)
    {
        $this->task_data = $task_data;
    }

}