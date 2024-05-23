<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">
                <input type="checkbox" value="" id="checkAll" class="input-checkbox ">
            </th>
            <th class="text-center">Tên nhóm thành viên </th>
            <th class="text-center">Số thành viên</th>
            <th class="text-center">Mô tả</th>
            <th class="text-center">Tình trạng </th>
            <th class="text-center">Thao tác</th>


        </tr>
    </thead>
    <tbody>
        @if (isset($userCatalogues) && is_object($userCatalogues))
            @foreach ($userCatalogues as $userCatalogue)
                <tr>

                    <td class="js-switch-{{ $userCatalogue->id }} text-center"> <input type="checkbox"
                            value="{{ $userCatalogue->id }}" id="checkValue" class="input-checkbox checkBoxItem"></td>
                    <td class="text-center">{{ $userCatalogue->name }}</td>
                    <td class="text-center">{{ $userCatalogue->users_count }}</td>
          
                    <td class="text-center">{{ $userCatalogue->description }}</td>

                    <td class="text-center"> <input type="checkbox" value="{{ $userCatalogue->publish }}"
                            class="js-switch status js-switch-{{ $userCatalogue->id }}" data-field="publish"
                            data-modelid="{{ $userCatalogue->id }}" data-model="UserCatalogue"
                            {{ $userCatalogue->publish == 2 ? 'checked' : '' }} /></td>
                    <td class="text-center">
                        <a href="{{ route('user.catalogue.edit', $userCatalogue->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('user.catalogue.delete', $userCatalogue->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>

                    </td>

                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $userCatalogues->links('pagination::bootstrap-4') }}
