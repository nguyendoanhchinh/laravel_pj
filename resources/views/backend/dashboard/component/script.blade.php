
<script src="backend/js/jquery-3.1.1.min.js"></script>
<script src="backend/js/bootstrap.min.js"></script>
<script src="backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="backend/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="backend/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="backend/library/library.js"></script>
@if(isset($config['js']) && is_array($config['js']))
    @foreach($config['js'] as $key=> $val)
        {!! "<script src=\"{$val}\"></script>" !!}
    @endforeach
@endif
