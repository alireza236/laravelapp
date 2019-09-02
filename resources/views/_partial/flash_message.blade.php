@if (Session::has('flash_message'))
<div class="alert alert-success {{ Session::has('penting') ? 'alert-important' : '' }}">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>{{ Session::get('flash_message') }}</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
</div>
@endif