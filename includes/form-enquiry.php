<!-- NOTE:
- We don't need any action or method params in the FORM element because we'll use jQuery to do the submit 
- Bootstrap class group `form-group row` enables us to have columns inside with `col-...` classes
- Bootstrap class `form-control` makes form fields look more elegant that basic HTML
-->
<form class="mt-4 mb-4" style="border: dashed red 1px;">

  <h2>Send an equiry aobut <?php the_title(); ?></h2>

  <div class="form-group row">

    <div class="col-lg-6">
      <input type="text" name="fname" placeholder="First Name" class="form-control" required>
    </div>

    <div class="col-lg-6">
      <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
    </div>

  </div>

  <div class="form-group row">

    <div class="col-lg-6">
      <input type="email" name="email" placeholder="Email Address" class="form-control" required>
    </div>

    <div class="col-lg-6">
      <input type="tel" name="phone" placeholder="Phone Number" class="form-control" required>
    </div>

  </div>

  <div class="form-group">

    <textarea name="enquiry" class="form-control" placeholder="Your Enquiry" required></textarea>

  </div>

  <div class="form-group d-grid gap-2">

    <button type="submit" class="btn btn-success btn-block">Send your enquiry</button>

  </div>


</form>