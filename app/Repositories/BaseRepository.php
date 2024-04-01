<?php


namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;

/**
 * Class ProvinceServices
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
      $this->model=$model;
    }
    public function all()
    {
     return $this->model->all();
    }

    public  function  pagination(
        array $column=['*'], array $condition=[], array $join=[], array $extend=[] ,int $perPage=1
    ){
        $query= $this->model->select($column)->where(function ($query) use ($condition){
            if (isset($condition['keyword']) && !empty($condition['keyword']) ){
                $query->where('name','LIKE','%'.$condition['keyword'].'%');
            }
        });
        if (!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perPage)
                     -> withQueryString()->withPath(env('APP_URL').$extend['path']);
}

    public function create(array $payload=[]){
        $model=$this->model->create($payload);
        return $model->fresh();
    }

    public function update(int $id=0, array $payload=[] )
    {
        $model = $this->findById($id);
        return $model->update($payload);
    }

    public  function  updateByWhereIn(string $whereInField='',array $whereIn=[],array $payload=[]){
          return  $this->model->WhereIn($whereInField,$whereIn)->update($payload);
    }


    public function findById(int $modelId,array $column=['*'],array $relation=[]){

    return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }

    public  function  delete(int $id=0){
        return $this->findById($id)->delete();
    }
    public  function  forcedelete(int $id=0){
        return $this->findById($id)->forcedelete();
    }

}