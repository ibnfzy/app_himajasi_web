<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index(): string
    {
        return view('web/base', [
            'slider' => $this->db->table('slider')->get()->getResultArray()
        ]);
    }
}
