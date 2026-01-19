<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function store(Request $request)
    {
       $user = new User();
        $user->createUser($request->all());
        return redirect()->route('users.index');

    }
    public function index()
    {
        $users = (new User())->getUsers();
        return view('users.index', ['users' => $users]);
    }
}
