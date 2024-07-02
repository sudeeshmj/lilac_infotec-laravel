<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with(['designation', 'department'])->get();
        return view('users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhereHas('designation', function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('department', function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->get();

        $output = '';

        foreach($users as $user) {
            $output .= '
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">'.$user->name.'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">'.$user->designation->name.'</h6>
                        <p class="card-text">'.$user->department->name.'</p>
                    </div>
                </div>
            ';
        }

        return response()->json($output);
    }
}
