<template>
<div>
   <div class="container">
     <div class="card card-login mx-auto mt-5">
      <div class="card-header">Forget Password</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder=" Existing Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Existing Email address</label>
            </div>
          </div>
         
          <button type=""submit class="btn btn-primary btn-block">Forget password</button>
        </form>
        <div class="text-center">
        
            <router-link to="/" class="d-block small mt-3">Back to login</router-link>
      
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
</script>
<style>

</style>