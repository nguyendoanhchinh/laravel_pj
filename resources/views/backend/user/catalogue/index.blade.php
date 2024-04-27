@include('backend.dashboard.component.breadcrumb',['title'=>$config['seo']['index']['title']]);
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ $config['seo']['index']['table'] }}</h5>
                @include('backend.user.user.component.toolbox');
            </div>
            <td class="ibox-content">
                @include('backend.user.user.component.filter');

                @include('backend.user.user.component.table ',['tableTitle'=>$config['seo']['index']['table']]);

            </div>
        </div>
    </div>
<div>
</div>
