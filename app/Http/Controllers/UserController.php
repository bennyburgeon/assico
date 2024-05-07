<?php

namespace App\Http\Controllers;
use App\DataTables\UserDataTable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('employee.list');
    }
    
    public function datatables(UserDataTable $dataTable)
    {
        return $dataTable->ajax();
    }
}
