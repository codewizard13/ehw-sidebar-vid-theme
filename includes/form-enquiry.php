<div id="success_message" class="alert alert-success" style="display:none"></div>


<!-- NOTE:
- We don't need any action or method params in the FORM element because we'll use jQuery to do the submit 
- Bootstrap class group `form-group row` enables us to have columns inside with `col-...` classes
- Bootstrap class `form-control` makes form fields look more elegant that basic HTML
-->
<form id="enquiry" class="mt-4 mb-4" style="border: dashed red 1px;">

  <h2>Send an enquiry about <?php the_title(); ?></h2>

  <input type="hidden" name="registration" value="<?php the_field('registration');?>">

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


<script>
  (function ($) {

    $('#enquiry').submit(function () {

      event.preventDefault(); // stops form from HTML submit so jQuery can handle the submit

      var endpoint = '<?php echo admin_url('admin-ajax.php');?>';

      var form = $('#enquiry').serialize();

      // console.log(form) // result like: fname=Eric&lname=Hepperle&email=erichepperle.jobs%40gmail.com&phone=5034623553&enquiry=ff

      var formdata = new FormData;

      formdata.append('action','enquiry'); // tells wordpress what action name / function name to look for
      formdata.append('enquiry', form) // adds the data from the form

      $.ajax(endpoint, {

        type: 'POST',
        data: formdata,
        processData: false, // turn off default actions by AJAX request; turn off turning into query string because we've already done that
        contentType: false, // what type of data sending; turn off because we're using FormData 

        success: function(res) {

          // alert(res.data)
          $('#enquiry').fadeOut(200)

          $('#success_message').text('Thanks for your enquiry').show();

          $('#enquiry').fadeIn(500)

        },

        error: function(err) {

        }
      })

    });

  })(jQuery)


</script>