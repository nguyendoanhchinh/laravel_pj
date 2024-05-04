<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserCatalogueRequest;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;

class UserCatalogueController extends Controller
{
    protected  $userCatalogueService;
    protected  $userCatalogueRepository;
    public function __construct(
        UserCatalogueService $userCatalogueService ,
        UserCatalogueRepository $userCatalogueRepository
    ){
        $this->userCatalogueService=$userCatalogueService;
        $this->userCatalogueRepository=$userCatalogueRepository;
   
    }
    public function index(Request $request){
       
        $userCatalogues=$this->userCatalogueService->paginate($request);
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

        $config['seo']=config('apps.usercatalogue');

        $template='backend.user.catalogue.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogues'
        ));

    }
    public function create(){

        
        $config['seo']=config('apps.usercatalogue');
        $config['method']='create';
        $template='backend.user.catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
           
        ));
    }
    public function store(StoreUserCatalogueRequest $request){

        if ($this->userCatalogueService->create($request)){
            return redirect()->route('user.catalogue.index')->with('success','Thêm mới thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Thêm mới không thành công');
    }

    public function edit($id){
        
        $usercatalogue=$this->userCatalogueRepository->findById($id);
    
        $config=[
            'css'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'],
            'js'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
            ]
        ];
        $config['seo']=config('apps.usercatalogue');
        $config['method']='edit';
        $template='backend.user.catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'usercatalogue'

        ));
    }

     public  function  update($id,StoreUserCatalogueRequest $request){
         if ($this->userCatalogueService->update($id, $request)){
             return redirect()->route('user.catalogue.index')->with('success','Cập nhật thành công');
         }
         return redirect()->route('user.catalogue.index')->with('error','Cập nhật không thành công');
     }
    public  function delete($id){
        $config['seo']=config('apps.usercatalogue');
       
        $userCatalogue=$this->userCatalogueRepository->findById($id);
      
        $template='backend.user.catalogue.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogue'

        ));
    }
    public  function  destroy($id){
        if ($this->userCatalogueService->destroy($id)){
            return redirect()->route('user.catalogue.index')->with('success','Xóa bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Xóa bản ghi không thành công');
    }
}
