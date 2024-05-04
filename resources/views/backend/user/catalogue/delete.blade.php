@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']]);

<form action="{{route('user.destroy',$userCatalogue->id)}}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-heal">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>-- Bạn có muốn xóa nhóm thành viên không.</p>
                        <p>-- Lưu ý : Không thể khôi phục sau khi xóa.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Họ và tên</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="name" value="{{ old('name', $userCatalogue->name ?? '') }}"
                                           class="form-control" placeholder="" autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


        </div>
        <div class="text-right mb15">
                <button class="btn btn-danger" type="submit" name="send">Xóa dữ liệu</button>
        </div>
    </div>
</form>
