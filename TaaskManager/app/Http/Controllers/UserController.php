<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditNameRequest;
use App\Http\Requests\EditPassword;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\TaskRequest;
use App\Models\TaskModel;
use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Register page
    public function RegisterPage(){
        return view('pages.register');
    }

    //Login page
    public function LoginPage(){
        return view('pages.login');
    }

    //Main page
    public function MainPage(){
        $user = Auth::guard('user')->user();
        $tasks = TaskModel::where('user_id',$user->id)->get();
        return view('pages.index',compact(['user','tasks']));
    }

    //Task Page
    public function TaskPage($task_id){
        $task = TaskModel::find($task_id);
        return view('pages.task_information',compact('task'));
    }

    //Edit task page
    public function EditTaskPage($task_id){
        $task = TaskModel::find($task_id);
        return view('pages.edit_task',compact('task'));
    }

    //Create task page
    public function CreateTaskPage(){
        return view('pages.create_task');
    }

    //Edit profile page
    public function EditProfilePage(){
        $user = Auth::guard('user')->user();
        return view('pages.edit_profile',compact('user'));
    }

    //Edit password page
    public function EditPasswordPage(){
        return view('pages.change_password');
    }

    //Register  function
    public function Register(RegisterRequest $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $sure_password = $request->input('sure_password');
        if($password === $sure_password){
            TaskUser::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
            ]);
            if(Auth::guard('user')->attempt(['email' => $email, 'password' => $password])){
            $user = Auth::guard('user')->user();
            $request->session()->put('user',$user);
            return redirect()->route('main_page');
            }
        }else{
            return redirect()->back()->with('error','error in password field');
        }
    }

    //Login function
    public function Login(LoginRequest $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::guard('user')->attempt(['email'=>$email,'password'=>$password])){
            $user = Auth::guard('user')->user();
            $request->session('user',$user);
            return redirect()->route('main_page');
        }
        return redirect()->back()->with('error','email or password is not correct');
    }

    //Edit task function
    public function EditTask($task_id,TaskRequest $request){
        $task = TaskModel::find($task_id);
        $title = $request->input('title');
        $text = $request->input('text');
        $task->update([
            'title'=>$title,
            'text'=>$text,
        ]);
        return redirect()->route('task_page',$task->id);
    }

    //Delete task function
    public function DeleteTask($task_id){
        $task = TaskModel::find($task_id);
        $task->delete();
        return redirect()->route('main_page');
    }

    //Create task function
    public function CreateTask(TaskRequest $request){
        $user = Auth::guard('user')->user();
        $title = $request->input('title');
        $text = $request->input('text');
        TaskModel::create([
            'title'=>$title,
            'object'=>$text,
            'user_id'=>$user->id,
        ]);
        return redirect()->route('main_page');
    }

    //Accept task function
    public function AcceptTask($task_id){
        $task = TaskModel::find($task_id);
        if($task->accepted){
            $task->accepted = 0;
        }else{
            $task->accepted = 1;
        }
        $task->update();
        return redirect()->back();
    }

    //Logout function
    public function Logout(){
        Auth::guard('user')->logout();
        return redirect()->route('log');    
    }

    //Edit profile name function
    public function EditProfileName(EditNameRequest $request){
        $user = Auth::guard('user')->user();
        $name = $request->input('name');
        $user->update(['name'=>$name]);
        return redirect()->route('main_page');
    }

    //Edit password function
    public function EditPassword(EditPassword $request){
        $user = Auth::guard('user')->user();
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        $new_password2 = $request->input('new_password2');
        if(Hash::check($old_password,$user->password)){
            if($new_password === $new_password2){
                $user->update([
                    'password'=>$new_password,
                ]);
                return redirect()->route('main_page');
            }else{
                return redirect()->back()->with('error','error in password');
            }
        }else{
            return redirect()->back()->with('error','this is not your password');
        }
    }
}