<form action="{{route('user.index')}}">
    <div class="filter">
        <div class="us-flex us-flex-middle us-flex-space-between">
            <div class="perpage">
                @php
                    $perpage=request('perpage')?:old('perpage');
                @endphp
                <div class="us-flex us-flex-middle us-flex-space-between">
                    <select name="perpage" CLASS="form-control input-sm perpage   mr10">
                        @for($i=20;$i<=200;$i+=20)
                            <option  {{($perpage==$i)? 'selected':''}} value="{{$i}}">{{$i}} Bản ghi</option>
                        @endfor
                    </select>

                </div>
            </div>
            <div class="action">
                <div class="us-flex us-flex-middle">
                    @php
                        $publishArr=['UnPublish','Publish'];
                         $publish=request('publish')?:old('publish') ?:'-1';
                    @endphp
                    <select name="publish" class="form-control mr10 setupSelect2 ">
                        <option value="-1" selected="selected">Chọn tình trạng</option>
                        @foreach($publishArr as  $key=>$val)
                            <option {{($publish==$key)? 'selected':''}} value="{{$key}}" >{{$val}}</option>
                        @endforeach

                    </select>
                    <select name="user_catalogue_id" class="form-control mr10 setupSelect2 ">
                        <option value="0" selected="selected">Chọn nhóm thành viên</option>
                        <option value="1" >Quản trị viên</option>
                    </select>
                    <div class="us-search us-flex us-flex-middle mr10">
                        <div class="input-group">
                            <input type="text"
                                   name="keyword"
                                   value="{{ request('keyword') ?: old('keyword')}}"
                                   placeholder="Nhập từ khóa bạn muốn tìm kiếm..." class="form-control" >
                            <span class="input-group-btn">
                                                <button type="submit" name="search" value="search" class="btn btn-primary mb0 btn-sm">Tìm kiếm</button>
                                            </span>
                        </div>
                    </div>
                    <a href="{{route('user.create')}}" class="btn btn-danger"><i class="fa fa-plus"> </i>Thêm mới thành viên</a>
                </div>
            </div>
        </div>
    </div>

</form>
