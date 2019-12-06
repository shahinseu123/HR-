<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth:api');
    //    $this->authorize('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('isAdmin');
        if (\Gate::allows('isAdmin')||\Gate::allows('isAuthor')) {
            
            return User::latest()->paginate(20);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|String|email|unique:users',
            'password' => 'required'
        ]);
   
           return User::create([
               'name' => $request['name'],
               'empid' => $request['empid'],
               'department' => $request['department'],
               'email' => $request['email'],
               'bio' => $request['bio'],
               'type' => $request['type'],
               'photo' => $request['photo'],
               'password' =>Hash::make($request['password'])
   
           ]);
        return ['msg' => 'success'];
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return ['msg' => 'Success'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $user = User::findOrFail($id);
        $user->delete();
        return ['msg' => 'Deleted'];
    }

    public function profile()
    {
        // return Auth::user(); for normal controller
        // $user = auth('api')->user()->id;
        // return $user->with('create_leaves')->get();
        // return auth('api')->user()->with('create_leaves','invoices', 'purchases')->get(); // for api controller 
        return auth('api')->user(); // for api controller 
        //  return auth('api')->user()->create_leaves; // for api controller 
        // return auth('api')->user()->with('create_leaves'); // for api controller 

    }
    // public function profile_invo()
    // {
    //      return auth('api')->user()->invoices;
    // }
    // public function profile_pur()
    // {
    //      return auth('api')->user()->purchases;
    // }

    // public function updateProfile(Request $request)
    // {
      
    //     $user = auth('api')->user(); // for api controller 

    //     //  $this->validate($request, [
    //     //      '
    //     //  ]);

    //     $currentPhoto = $user->photo;

    //     if($request->photo != $currentPhoto){
    //         $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
    //         \Image::make($request->photo)->save(public_path('img/profile/').$name);
    //         $request->merge(['photo' => $name]);

    //         $userPhoto = public_path('img/profile/').$currentPhoto;
    //         if(file_exists( $userPhoto)){
    //            @unlink($userPhoto);
    //         }
    //     }

    //     if(!empty($request->password)){
    //         $request->merge(['password' => Hash::make($request['password'])]);
    //     }

    //     $user->update($request->all());
    //     return ['msg' => 'Updated successfully'];
    // }

}
