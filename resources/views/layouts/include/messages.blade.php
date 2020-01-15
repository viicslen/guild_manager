@if(Session::has('success'))
    @if(is_array(Session::get('success')))
        @foreach(Session::get('success') as $message)
            <script>$(function () {toastr.success('{!! $message !!}');})</script>
        @endforeach
    @else
        <script>$(function () {toastr.success('{!! Session::get('success') !!}');})</script>
    @endif
@elseif(Session::has('info'))
    @if(is_array(Session::get('info')))
        @foreach(Session::get('info') as $message)
            <script>$(function () {toastr.info('{!! $message !!}');})</script>
        @endforeach
    @else
        <script>$(function () {toastr.info('{!! Session::get('info') !!}');})</script>
    @endif
@elseif(Session::has('warning'))
    @if(is_array(Session::get('warning')))
        @foreach(Session::get('warning') as $message)
            <script>$(function () {toastr.warning('{!! $message !!}');})</script>
        @endforeach
    @else
        <script>$(function () {toastr.warning('{!! Session::get('warning') !!}');})</script>
    @endif
@elseif(Session::has('error') )
    @if(is_array(Session::get('error')))
        @foreach(Session::get('error') as $message)
            <script>$(function () {toastr.error('{!! $message !!}');})</script>
        @endforeach
    @else
        <script>$(function () {toastr.error('{!! Session::get('error') !!}');})</script>
    @endif
@endif
