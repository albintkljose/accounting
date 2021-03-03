@extends('layouts.app')
@section('content')
<form method="post" action="{{ route('create.store') }}">  
   @csrf     
          <div class="form-group">      
              <label for="first_name">First Name:</label><br/><br/>  
              <input type="text" class="form-control" name="first_name"/><br/><br/>  
          </div>  
<div class="form-group">      
<label for="first_name">Last Name:</label><br/><br/>  
              <input type="text" class="form-control" name="last_name"/><br/><br/>  
          </div>  
<div class="form-group">      
              <label for="gender">Gender:</label><br/><br/>  
              <input type="text" class="form-control" name="gender"/><br/><br/>  
          </div>  
<div class="form-group">      
              <label for="qualifications">Qualifications:</label><br/><br/>  
              <input type="text" class="form-control" name="qualifications"/><br/><br/>  
          </div>  
<br/>  
<button type="submit" class="btn-btn" >Insert</button>  
</form>  
@endsection