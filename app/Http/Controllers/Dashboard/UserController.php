<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Utils\HelperFunctions;
use App\Utils\Validations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use mysql_xdevapi\Exception;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['admin', 'company']), 403);
        try {
            if ($request->ajax()) {
                if ($user->hasRole('admin')) {
                    $data = User::role(['user', 'supervisor', 'scaffolder'])->latest()->get();
                } elseif ($user->hasRole('company')) {
                    $data = User::role(['user', 'supervisor', 'scaffolder'])->where('company_id', auth()->user()->id)->get();
                }
                return Datatables::of($data)
                    ->removeColumn('id')
                    ->editColumn('company_id', function ($data) {
                        return $data->userCompany->name ?? '';
                    })
                    ->addColumn('action', function ($data) use ($user) {
                        if ($user->hasRole('admin')) {
                            $btn = '<div class="d-flex">
                                <a href="' . route('users.edit', $data->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <form method="POST" action="' . route('users.destroy', $data->id) . '"  id="form_' . $data->id . '" >
                                    ' . method_field('Delete') . csrf_field() . '

                                    <button type="submit" id="' . $data->id . '" class="confirm btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                        <!--end::Svg Icon-->
                                    </button>
                                </form></div>';
                        } else {
                            $btn = '';
                        }
                        return $btn;
                    })
                    ->rawColumns(['company_id', 'action'])
                    ->make(true);
            }

            return view('dashboard.users.index');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['admin']), 403);
        try {
            $companies = User::role('company')->latest()->get();
            return view('dashboard.users.create', compact('companies'));
        } catch (\Exception $exception) {
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validations::storeUser($request);
        try {
            $all_inputs = $request->except('_token', 'role');
            if ($request->file('image')) {
                $filePath = HelperFunctions::profileImagePath();
                $all_inputs['image'] = HelperFunctions::saveFile(null, $request->file('image'), $filePath);
            }
            $all_inputs['password'] = Hash::make($request->password);
            $all_inputs['email_verified_at'] = now();

            $user = User::create($all_inputs);
            //Assigned role to user. role is already created during seeder
            //$user->assignRole('user');
            $user->assignRole($request->role);
            //Add projects for user
            $user->userProjects()->sync($all_inputs['projects']);
            toastSuccess('User successfully added!');
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try {
        } catch (\Exception $exception) {
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::role(['company', 'user', 'supervisor'])
                ->with(['userProjects', 'userCompany'])
                ->where('id', $id)
                ->first();
            $company_projects = $user->userCompany->companyProjects;
            $user_projects = $user->userProjects->pluck('id')->toarray();
            $companies = User::role('company')->latest()->get();
            return view('dashboard.users.edit', compact('user_projects', 'user', 'companies', 'company_projects'));
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Validations::updateUser($request, $user->id);
        try {
            $all_inputs = $request->except('_token', '_method');
            $user->update([
                'name' => $all_inputs['name'],
                'email' => $all_inputs['email'],
                'company_id' => $all_inputs['company_id']
            ]);
            $user->assignRole($request->role);
            $user->userProjects()->sync($all_inputs['projects']);
            toastSuccess('Profile Updated Successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            @unlink($user->image);
            $user->delete();
            toastSuccess('User deleted successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function updatePassword(Request $request, User $user)
    {
        Validations::updateUserPassword($request, $user->id);
        try {
            $all_inputs['password'] = Hash::make($request->password);
            $user->update([
                'password' => $all_inputs['password'],
            ]);
            toastSuccess('Password updated successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
}
