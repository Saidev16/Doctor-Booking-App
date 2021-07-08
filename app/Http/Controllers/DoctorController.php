<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Mail\CreateDocMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(\Auth::user()->role->name);
        $users = User::where('role_id', '!=', 3)->get();
        return view('admin.doctor.index' , compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validateStore( $request );
        $data = $request->all();

        $name = (new User)->userAvatar( $request );

        $data['image'] = $name ;
        $data['password'] = bcrypt( $request->password );
        User::create($data);

        $mailData = [
            'doctorName' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        // try {
            Mail::to($request->email)->send(new CreateDocMail($mailData));
        // } catch (\Exception $e) {
        //     report($e);
        // }

        return redirect()->back()->with('message', 'Doctor added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.doctor.delete', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.doctor.edit', compact('user'));
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
        // $this->validateUpdate( $request , $id);
        $data = $request->all() ;
        $user = User::find($id);
        $imageName = $user->image ;
        $userPassword = $user->password;
        
        if( $request->hasFile('image') ){

            $imageName = (new User)->userAvatar( $request );
            unlink( 'images/'.$user->image );
               
        }
        $data['image'] = $imageName;
        if( $request->password ){
            $data['password'] = bcrypt($request->password) ;
        }else{
            $data['password'] = $userPassword;
        }

        $user->update($data);
        return redirect()->route('doctors.index')->with('message', 'Doctor updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          if( auth()->user()->id == $id ){
              abort(401);
          }
          $user = User::find($id);
          $userDelete = $user->delete();

          if( $userDelete ){
              unlink( public_path('images/'. $user->image ) );
          }

        return redirect()->route('doctors.index')->with('message', 'Doctor Deleted successfully');


    }

    public function demande()
    {
        $users = Doctor::all();
        return view('admin.doctor.demande' , compact('users'));  
    }

    public function add($id)
    {
        $user = Doctor::find($id);
        return view('admin.doctor.add', compact('user'));
    }

    public function validateStore($request){

        return $this->validate($request , [
            'name'=> 'required',
            'email'=> 'required|unique:users',
            'password'=> 'required|min:6|max:25',
            'gender'=> 'required',
            'education'=> 'required',
            'ville'=> 'required',
            'department'=> 'required',
            'phone_number'=> 'required|numeric',
            'image'=> 'required|mimes:jpeg,jpg,png',
            'role_id'=> 'required',
            'description'=> 'required',
        ] );

        
    }
    public function validateUpdate($request,$id){

        return $this->validate($request , [
            'name'=> 'required',
            'email'=> 'required|unique:users,email,'.$id,
            'gender'=> 'required',
            'education'=> 'required',
            'ville'=> 'required',
            'department'=> 'required',
            'phone_number'=> 'required|numeric',
            'image'=> 'mimes:jpeg,jpg,png',
            'role_id'=> 'required',
            'description'=> 'required',
        ] );

        
 
    }

    

}
