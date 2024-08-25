<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\PaymentMethod;

use App\Models\Store;

use App\Models\Warehouse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;



class EmployeeController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $roles = Role::all();

        $users = User::when($request->id, function ($query, $id) {

            return $query->where('id', $id);
        })

            ->when($request->s, function ($query, $keyword) {

                return $query->where('name', 'like', '%' . $keyword . '%');
            })

            ->when($request->email, function ($query, $email) {

                return $query->where('email', 'like', '%' . $email . '%');
            })

            //->whereIn('role_id', [1,2,3])

            ->orderBy('id', 'DESC')

            ->paginate(20);



        return view('dashboard.employee.index', compact('users', 'roles'));
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::get();

        $stores = Store::orderBy('name', 'ASC')->get();

        $warehouses = Warehouse::orderBy('name', 'ASC')->get();

        return view('dashboard.employee.form', compact('roles', 'stores', 'warehouses'));
    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $validated = $request->validate([
            'full_name' => 'required',

            'name' => 'required|unique:name,email',

            'email' => 'required|unique:users,email',

            'password' => 'required',

            'role_id' => 'required',

            'photo' => 'image',

        ]);



        $validated['password'] = Hash::make($validated['password']);



        if ($request->hasFile('photo')) {

            $thumbnail = $request->file('photo');

            $validated['photo'] = $thumbnail->storeAs('photo', $thumbnail->hashName(), 'public');
        }



        $user = User::create($validated);



        return redirect(route('employee.edit', $user->id))

            ->with('status', 'success')

            ->with('message', 'Data created');
    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Models\User  $employee

     * @return \Illuminate\Http\Response

     */

    public function show(User $employee)

    {

        return $employee;
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Models\User  $employee

     * @return \Illuminate\Http\Response

     */

    public function edit(User $employee)

    {

        return view('dashboard.employee.form', [
            'user' => $employee,
            'roles' => Role::get(),
        ]);
    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Models\User  $employee

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, User $employee)

    {

        $validated = $request->validate([
            'full_name' => 'required',
            'name' => 'required|unique:users,name,' . $employee->id,
            'email' => 'required|unique:users,email,' . $employee->id,
            'photo' => 'image',
            'role_id' => 'required'
        ]);



        if ($request->password) {
            $validated['password'] = Hash::make($request->password);
        }



        if ($request->hasFile('photo')) {

            $thumbnail = $request->file('photo');

            $validated['photo'] = $thumbnail->storeAs('photo', $thumbnail->hashName(), 'public');
        }

        $role_id = $validated['role_id'];

        unset($validated['role_id']);

        $employee->update($validated);
        $employee->assignRole($role_id);


        return back()

            ->with('status', 'success')

            ->with('message', 'Data updated successfully');
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Models\User  $employee

     * @return \Illuminate\Http\Response

     */

    public function destroy(User $employee)

    {

        $employee->delete();

        return back()

            ->with('status', 'success')

            ->with('message', 'Data deleted');
    }
}
