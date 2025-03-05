<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
{
    $data = ['message' => 'Bem-vindo à Questão 01!'];
    return view('quest01', $data);
}

}
