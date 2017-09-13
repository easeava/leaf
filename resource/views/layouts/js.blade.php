@foreach($js as $j)
    <script type="text/javascript" src="{{ admin_asset ("$j") }}"></script>
@endforeach
