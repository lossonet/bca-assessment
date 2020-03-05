<?php include('views/header.view.php'); ?>

<div class="py-5 text-center">
  <h1>BCA Assessment</h1>
  <p class="lead">Programming assessment to evaluate coding and research skills.</p>
</div>

<?php if ($alert->message()): ?>
  <div class="mb-5 alert alert-<?= $alert->type() ?>" role="alert">
    <?= $alert->message() ?>
  </div>
<?php endif; ?>

<div class="row">

  <div class="col-md-12">

    <form method="post" action="actions.php?action=add" class="needs-validation" novalidate>

      <h2 class="mb-4">Client Information</h2>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="salutation">Salutation <span class="text-muted">(required)</span></label>
          <input type="text" id="salutation" name="salutation" class="form-control" placeholder="Mr., Ms., Mrs., Dr." value="<?= isset($post_data['salutation']) ? $post_data['salutation'] : null; ?>" required>
          <div class="invalid-feedback">
            Valid salutation is required.
          </div>
        </div>        
        <div class="col-md-4 mb-3">
          <label for="first_name">First Name <span class="text-muted">(required)</span></label>
          <input type="text" id="first_name" name="first_name" class="form-control" placeholder="" value="<?= isset($post_data['first_name']) ? $post_data['first_name'] : null; ?>" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="last_name">Last Name <span class="text-muted">(required)</span></label>
          <input type="text" id="last_name" name="last_name" class="form-control" placeholder="" value="<?= isset($post_data['last_name']) ? $post_data['last_name'] : null; ?>" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="email">Email <span class="text-muted">(required)</span></label>
        <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com" value="<?= isset($post_data['email']) ? $post_data['email'] : null; ?>" required>
        <div class="invalid-feedback">
          Please enter a valid email address.
        </div>
      </div>

      <div class="row">
        <div class="col-md-8 mb-3">
          <label for="country">Country <span class="text-muted">(required)</span></label>
          <select id="country" name="country" class="custom-select d-block w-100" required>
            <option value="">Choose...</option>
            <option value="USA">United States (USA)</option>
            <option value="CAN">Canada (CAN)</option>
            <option value="GBR">United Kingdom (GBR)</option>
            <option value="IND">India (IND)</option>
            <option value="CUB">Cuba (CUB)</option>
          </select>
          <div class="invalid-feedback">
            Please select a country.
          </div>
        </div>        
        <div class="col-md-4 mb-3">
          <label for="zipcode">Zip Code</label>
          <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?= isset($post_data['zipcode']) ? $post_data['zipcode'] : null; ?>" placeholder="">
          <div class="invalid-feedback">
            Please enter a valid zip code (numbers only).
          </div>
        </div>
      </div>

      <div class="form-group my-2">
        <div class="form-check">
          <input type="checkbox" id="newsletter" name="newsletter" class="form-check-input" value="1">
          <label class="form-check-label" for="newsletter">
            Include client in email list
          </label>
        </div>
      </div>

      <hr class="my-4">

      <h2 class="mb-4">Research Preference</h2>

      <div class="row">
        <div class="col-lg-4 mb-3">
          <span class="mb-2">Asset Class</span> <span class="text-muted">(required)</span>
          <div class="custom-control custom-radio">
            <input type="radio" id="large" name="asset_class" class="custom-control-input" value="large" required>
            <label class="custom-control-label" for="large">Large</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="mid" name="asset_class" class="custom-control-input" value="mid" required>
            <label class="custom-control-label" for="mid">Mid</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="small" name="asset_class" class="custom-control-input" value="small" required>
            <label class="custom-control-label" for="small">Small</label>
          </div>
        </div>        
        <div class="col-lg-4 mb-3">
          <label for="investment_time">Investment Time Horizon <span class="text-muted">(required)</span></label>
          <select id="investment_time" name="investment_time" class="custom-select d-block w-100" required>
            <option value="">Choose...</option>
            <option value="short">Short (< 3 months)</option>
            <option value="medium">Medium (< 2 years)</option>
            <option value="long">Long (> 2 years)</option>
          </select>
          <div class="invalid-feedback">
            Please select an investment time horizon.
          </div>
        </div>
        <div class="col-lg-4 mb-3">
          <label for="expected_date">Expected Purchase Date <span class="text-muted">(required)</span></label>
          <input type="text" id="expected_date" name="expected_date" class="form-control" placeholder="yyyy-mm-dd" value="<?= isset($post_data['expected_date']) ? $post_data['expected_date'] : null; ?>" required>
          <div class="invalid-feedback">
            Valid date is required.
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="comments">Comments <span class="text-muted">(max 500 characters)</span></label>
        <textarea id="comments" name="comments" class="form-control" maxlength="500" rows="5"><?= isset($post_data['comments']) ? $post_data['comments'] : null; ?></textarea>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <button class="btn btn-outline-primary btn-lg btn-block" type="submit">Submit</button>
        </div>        
        <div class="col-md-6 mb-3">
          <button class="btn btn-outline-secondary btn-lg btn-block" type="reset">Reset</button>
        </div>
      </div>

    </form>

  </div><!-- /.col-md-12 -->

</div><!-- /.row -->

<hr class="mb-4">

<?php include('views/registered-clients.view.php'); ?>

<?php include('views/footer.view.php'); ?>