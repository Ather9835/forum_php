
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <form action="/forum/dir/_signup.php" method="post">
      <div class="modal-body">
     
      <div class="form-group">
            <label for="name">Username</label>
           <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>

  <div class="form-group">
    <label for="CPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="CPassword" name="CPassword" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

      </div>
      </form>
    
    </div>
  </div>
</div>