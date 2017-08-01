<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\IRepository\UserRepositoryInterface;
use App\Http\Controllers\IService\UserServiceInterface;
use App\Http\Controllers\IRepository\AuthorityRepositoryInterface;
use Log;

class UserController extends Controller
{
    protected $userRepo;
    protected $userService;
    protected $authRepo;

    public function __construct(UserRepositoryInterface $userRepo,
                                UserServiceInterface $userService,
                                AuthorityRepositoryInterface $authRepo){
        $this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->userService = $userService;
        $this->authRepo = $authRepo;
    }

    public function create(){
        $auths = $this->authRepo->getAllAuthority();
        return view('user.create',[
            'auths'=>$auths
        ]);
    }

    public function store(Request $request){
        Log::info($request->authority_id);
        if($this->userService->isExists($request->name))
        {
            return redirect()->back()->withErrors(array(['msg'=>'error']));
        }else
        {
            $this->userRepo->insertUser($request->all());
            return redirect()->back()->withErrors(array(['msg'=>'success']));
        };
    }

    public function edit()
    {
        $users = $this->userRepo->getAllUser();
        $auths = $this->authRepo->getAllAuthority();
        return view('user.edit',[
            'users'=>$users,
            'auths'=>$auths
        ]);
    }

    public function update($id,Request $request)
    {
        $this->userRepo->updateById($id,$request->all());
        return redirect()->back()->withErrors(array(['msg'=>'update_success']));
    }

    public function delete($id)
    {
        $this->userRepo->deleteById($id);
        return redirect()->back()->withErrors(array(['msg'=>'delete_success']));
    }
}
