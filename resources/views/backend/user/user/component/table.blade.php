<table class="table table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox">
        </th>
        <th class="text-center">Họ tên</th>
        <th class="text-center">Email</th>
        <th class="text-center">Số điện thoại</th>
        <th class="text-center">Địa chỉ</th>
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Trạng Thái</th>

    </tr>
    </thead>
    <tbody>
    @if(isset($users) && is_object($users))
        @foreach($users as $user)
        <tr>

                <td class="js-switch-{{$user->id}} text-center"> <input type="checkbox" value="{{$user->id}}" id="checkValue" class="input-checkbox checkBoxItem"></td>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center">{{$user->phone}}</td>
                <td class="text-center">{{$user->address}}</td>
                <td class="text-center"> <input type="checkbox" value="{{$user->publish}}" class="js-switch status js-switch-{{$user->id}}" data-field="publish"
                     data-modelid="{{$user->id}}" data-model="User" {{ $user->publish==1 ? 'checked' : '' }}  /></td>
                <td class="text-center">
                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{route('user.delete', $user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                </td>

        </tr>
        @endforeach
    @endif
    </tbody>
</table>
{{
    $users->links('pagination::bootstrap-4')
}}
   