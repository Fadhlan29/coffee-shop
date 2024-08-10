<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if (strlen($keyword)) {
            $account = User::where('name', 'like', "%$keyword%")->get();
        } else {
            $account = DB::table('users')
                ->orderBy('id', 'desc')
                ->get();
        }

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('accounts.index')->with('data', $account);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Name must be filled in',
            'email.required' => 'Email must be filled in',
            'password.required' => 'Password must be filled in',
            'phone.required' => 'Password must be filled in',
            'address.required' => 'Password must be filled in',
            'role.required' => 'Role must be filled in',
        ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => $request->role,
        // ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move('images/users/', $imageName);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => $imageName,
                'phone' => $request->phone,
                'address' => $request->address,
                'role' => $request->role,
            ]);
        }

        Alert::success('Success', 'Created data is success');
        return redirect('account');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        return view('accounts.update')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Name must be filled in',
            'email.required' => 'Email must be filled in',
            'phone.required' => 'Phone must be filled in',
            'address.required' => 'Address must be filled in',
            'role.required' => 'Role must be filled in',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move('images/users/', $imageName);
            $userData['image'] = $imageName;
        }

        User::where('id', $id)->update($userData);

        Alert::success('Success', 'Update data is success');
        return redirect('account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            $imagePath = public_path('images/users/' . $user->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $user->delete();
            Alert::success('Success', 'Delete data is success');
            return redirect('account');
        } else {
            return redirect()->to('account')->with('error', 'User not found');
        }
    }
}
