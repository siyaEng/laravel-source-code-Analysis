<?php

namespace App\Http\Controllers;

use Illuminate\Container\Container;

class HelloController
{
    public function getHelloControler()
    {
        return 'hello HelloControler';
    }

    public function getHelloModel()
    {
        $data = $this->getStudent();
        return '学生id' . $data['id'] . '<br />学生age' . $data['age'] . '<br />学生name' . $data['name'];
    }

    public function getHelloView()
    {
        $app = Container::getInstance();
        $factory = $app->make('view');
        $data = $this->getStudent();
        return $factory->make('getHelloView')->with('data', $data);
    }

    private function getStudent()
    {
        $student = \App\Models\Student::first();
        return $student->getAttributes();
    }
}