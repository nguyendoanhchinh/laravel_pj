<?php

namespace App\Http\Controllers\backend;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;

use App\Http\Requests\UpdateUserRequest;

class UserCatalogueController extends Controller
{
    protected  $userCatalogueService;

    protected  $userCatalogRepository;
    public function __construct(UserCatalogueService $userCatalogueService ,)
    {
        $this->userCatalogueService=$userCatalogueService;
   
    }
    public function index(Request $request){
        echo 123; die();
        $users=$this->userCatalogueService->paginate($request);
        $config=  [
            'js'=>[
                'backend/js/plugins/switchery/switchery.js',

                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'
            ],
            'css'=>[
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];

        $config['seo']=config('apps.user');

        $template='backend.user.catalogue.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users'
        ));

    }
    public function create(){

        $provinces= $this->provinceRepository->all();
        $config['method']='create';
        $config=[
            'css'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'],
            'js'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',


            ]
        ];
        $config['seo']=config('apps.user');
        $config['method']='create';
        $template='backend.user.catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces'

        ));
    }
    public function store(StoreUserRequest $request){

        if ($this->userCatalogueService->create($request)){
            return redirect()->route('user.index')->with('success','Thêm mới thành công');
        }
        return redirect()->route('user.index')->with('error','Thêm mới không thành công');
    }

    public  function  edit($id){
        $user=$this->userCatalogRepository->findById($id);

        $provinces= $this->provinceRepository->all();
        $config=[
            'css'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'],
            'js'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
            ]
        ];
        $config['seo']=config('apps.user');
        $config['method']='edit';
        $template='backend.user.catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces',
            'user'

        ));
    }

     public  function  update($id,UpdateUserRequest $request){
         if ($this->userCatalogueService->update($id, $request)){
             return redirect()->route('user.index')->with('success','Cập nhật thành công');
         }
         return redirect()->route('user.index')->with('error','Cập nhật không thành công');
     }
    public  function delete($id){
        $config['seo']=config('apps.user');

        $user=$this->userCatalogRepository->findById($id);
        $template='backend.user.catalogue.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'user'

        ));
    }
    public  function  destroy($id){
        if ($this->userCatalogueService->destroy($id)){
            return redirect()->route('user.index')->with('success','Xóa bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error','Xóa bản ghi không thành công');
    }
}
