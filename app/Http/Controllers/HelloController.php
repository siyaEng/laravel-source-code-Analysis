<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Container\Container;

class HelloController
{
    public function getHelloController()
    {
        return 'hello HelloController';
    }

    public function getHelloModel()
    {
        $data = $this->getStudent();

        return '学生id=' . $data['id'] . '<br />学生name=' . $data['name'] . '<br />学生age=' . $data['age'];
    }

    public function getHelloView()
    {
        $data = $this->getStudent();
        $app = Container::getInstance();
        $factory = $app->make('view');
        return $factory->make('getHelloView')->with('data', $data);
    }

    public function getStudent()
    {
        $student = Student::first();

        return $student->getAttributes();
    }
}
