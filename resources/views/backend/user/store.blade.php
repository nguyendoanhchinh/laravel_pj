@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']]);
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    $url= ( $config['method']=='create') ?  route('user.store') :  route('user.update',$user->id) ;
@endphp
<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-heal">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>-- Nhập thông tin cá nhân người sử dụng.</p>
                        <p>-- Lưu ý : Những trường đánh dấu <span class="text-danger">(*)</span> cần nhập đầy đủ thông
                            tin.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Email</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="email" value="{{ old('email', $user->email ?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Họ và tên</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @php
                            $userCatalogue = ['[Chọn nhóm thành viên]', 'Quản trị viên', 'Cộng tác viên'];
                        @endphp
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhóm thành viên</label>
                                    <span class="text-danger">(*)</span>
                                    <select name="user_catalogue_id" id="" class="form-control">
                                        @foreach ($userCatalogue as $key => $item)
                                            <option
                                                {{ old('user_catalogue_id', isset($user->user_catalogue_id) ? $user->user_catalogue_id : '') == $key ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ngày sinh</label>

                                    <input type="date" name="birthday"
                                        value="{{ old('birthday', isset($user->birthday) ? date('Y-m-d', strtotime($user->birthday)) : '') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @if ($config['method']=='create')
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Nhập mật khẩu</label>
                                        <span class="text-danger">(*)</span>
                                        <input type="password" name="password" value="" class="form-control"
                                            placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Nhập lại mật khẩu</label>
                                        <span class="text-danger">(*)</span>
                                        <input type="password" name="re_password" value="" class="form-control"
                                            placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ảnh đại diện</label>

                                    <input type="text" name="image" value="{{ old('image', $user->name ?? '') }}"
                                        class="form-control input-image" data-upload="Images" placeholder=""
                                        autocomplete="off">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr style="color: #1a2d41">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-heal">
                    <div class="panel-title">Thông tin Cá Nhân</div>
                    <div class="panel-description">Nhập thông tin cá nhân !!!</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Thành phố</label>
                                    <span class="text-danger">(*)</span>
                                    <select name="province_id" id=""
                                        class="form-control setupSelect2 province  location" data-target="districts">
                                        <option value="0">[ Chọn thành phố ]</option>
                                        @if (isset($provinces))
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->code }}">{{ $province->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Quận/Huyện</label>
                                    <select name="district_id" id=""
                                        class="form-control districts setupSelect2 location" data-target="wards">
                                        <option value="">[ Chọn Quận/Huyện ]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Phường/Xã</label>
                                    <span class="text-danger">(*)</span>
                                    <select name="ward_id" id="" class="form-control setupSelect2 wards">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Địa chỉ</label>
                                    <input type="text" name="address" value="{{ old('address', $user->address ?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Số Điện Thoại</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ghi Chú</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="description" value="{{ old('description',($user->description)?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send">Lưu lại</button>
        </div>
    </div>
</form>
<script>
    var province_id = '{{ (isset($user->province_id)) ? $user->province_id : old('province_id') }}'
    var district_id = '{{ (isset($user->district_id)) ? $user->district_id : old('district_id') }}'
    var ward_id = '{{ (isset($user->ward_id)) ? $user->ward_id : old('ward_id') }}'

</script>
