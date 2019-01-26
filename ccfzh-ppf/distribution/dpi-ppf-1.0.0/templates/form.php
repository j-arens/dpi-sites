<div id="dpi-forms__root">

  <div class="dpi-forms__wrapper">

    <!-- noscript -->
    <noscript>
      <p>This form requires Javascript to be enabled.</p>
      <p>Please visit <a href="http://www.enable-javascript.com/" target="_blank">this website</a> if you are unsure of what to do.</p>
    </noscript>
    <!-- /noscript -->

    <!-- form header -->
    <div class="dpi-forms__form-header">
      <div class="dpi-forms__form-header_logo" style="background-image: url(<?php echo plugins_url('../images/ccfzh-ppf-logo.png', __FILE__); ?>)"></div>
        <p class="dpi-forms__form-header_content">
            The Corpus Christi Foundation exists to provide a strong financial base that supports religious, educational, ministerial, and charitable works for the Lakeshore Catholic community.
      </p>
    </div>
    <!-- /form header -->

    <!-- fields 1 -->
    <div class="dpi-forms__fields" data-formsection="1">
      <p class="dpi-forms__fields-heading">I would like to support the future of the Lakeshore Catholic community!</p>
      <div class="dpi-forms__fields-wrapper">
        <label class="dpi-forms__label dpi-forms__label-half_width">
          <p class="dpi-forms__label-title">Please accept my gift of</p>
          <input class="dpi-forms__input dpi-forms__input-currency" name="donationAmount" type="number" min="0.01" step="0.01" required />
        </label>
        <label class="dpi-forms__label dpi-forms__label-half_width">
          <p class="dpi-forms__label-title">Full Name</p>
          <input type="text" class="dpi-forms__input" name="fullName" required />
        </label>
        <label class="dpi-forms__label dpi-forms__label-half_width">
          <p class="dpi-forms__label-title">Zip</p>
          <input type="number" min="0" step="1" class="dpi-forms__input" name="zipCode" required />
        </label>
        <label class="dpi-forms__label dpi-forms__label-half_width">
          <p class="dpi-forms__label-title">City</p>
          <input type="text" class="dpi-forms__input" name="city" required />
        </label>
        <label class="dpi-forms__label dpi-forms__label-half_width">
          <p class="dpi-forms__label-title">State</p>
          <select class="dpi-forms__input dpi-forms__select" name="state" required >
            <option disabled selected value=""></option>
            <option value="Alabama">Alabama</option>
            <option value="Alaska">Alaska</option>
            <option value="Arizonia">Arizonia</option>
            <option value="Arkansas">Arkansas</option>
            <option value="California">California</option>
            <option value="Colorado">Colorado</option>
            <option value="Connecticut">Connecticut</option>
            <option value="Delaware">Delaware</option>
            <option value="Dist. of Columbia">Dist. of Columbia</option>
            <option value="Florida">Florida</option>
            <option value="Georgia">Georgia</option>
            <option value="Hawaii">Hawaii</option>
            <option value="Idaho">Idaho</option>
            <option value="Illinois">Illinois</option>
            <option value="Indiana">Indiana</option>
            <option value="Iowa">Iowa</option>
            <option value="Kansas">Kansas</option>
            <option value="Kentucky">Kentucky</option>
            <option value="Louisiana">Louisiana</option>
            <option value="Maine">Maine</option>
            <option value="Maryland">Maryland</option>
            <option value="Massachusetts">Massachusetts</option>
            <option value="Michigan">Michigan</option>
            <option value="Minnesota">Minnesota</option>
            <option value="Mississippi">Mississippi</option>
            <option value="Missouri">Missouri</option>
            <option value="Montana">Montana</option>
            <option value="Nebraska">Nebraska</option>
            <option value="Nevada">Nevada</option>
            <option value="New Hampshire">New Hampshire</option>
            <option value="New Jersey">New Jersey</option>
            <option value="New Mexico">New Mexico</option>
            <option value="New York">New York</option>
            <option value="North Carolina">North Carolina</option>
            <option value="North Dakota">North Dakota</option>
            <option value="Ohio">Ohio</option>
            <option value="Oklahoma">Oklahoma</option>
            <option value="Oregon">Oregon</option>
            <option value="Pennsylvania">Pennsylvania</option>
            <option value="Rhode Island">Rhode Island</option>
            <option value="South Carolina">South Carolina</option>
            <option value="South Dakota">South Dakota</option>
            <option value="Tennessee">Tennessee</option>
            <option value="Texas">Texas</option>
            <option value="Utah">Utah</option>
            <option value="Vermont">Vermont</option>
            <option value="Virginia">Virginia</option>
            <option value="Washington">Washington</option>
            <option value="West Virginia">West Virginia</option>
            <option value="Wisconsin">Wisconsin</option>
            <option value="Wyoming">Wyoming</option>
        </select>
      </label>
      <label class="dpi-forms__label dpi-forms__label-half_width">
        <p class="dpi-forms__label-title">Address</p>
        <input type="text" class="dpi-forms__input" name="address" required />
      </label>
      <label class="dpi-forms__label dpi-forms__label-half_width">
        <p class="dpi-forms__label-title">Phone</p>
        <input type="tel" class="dpi-forms__input" name="phone" required />
      </label>
      <label class="dpi-forms__label dpi-forms__label-half_width">
        <p class="dpi-forms__label-title">Email</p>
        <input type="email" class="dpi-forms__input" name="email" required />
      </label>
      <label class="dpi-forms__label dpi-forms__label-full_width">
        <p class="dpi-forms__label-title">Please designate my gift to the following endowment fund:</p>
        <select class="dpi-forms__input dpi-forms__select" name="fund" required >
          <option value="Foundation General Fund">Foundation General Fund</option>
          <option value="Corpus Christi School Tuition Assistance Fund">Corpus Christi School Tuition Assistance Fund</option>
          <option value="Corpus Christi School General Fund">Corpus Christi School General Fund</option>
          <option value="St. Francis de Sales Parish Fund">St. Francis de Sales Parish Fund</option>
          <option value="Our Lady of the Lake Parish Fund">Our Lady of the Lake Parish Fund</option>
        </select>
      </label>
      <label class="dpi-forms__label dpi-forms__label-full_width">
        <p class="dpi-forms__label-title">This gift is in honor/memory of</p>
        <input type="text" class="dpi-forms__input" name="giftHonor" />
      </label>
    </div>
  </div>
  <!-- /fields 1 -->

  <!-- dynamic modals -->
  <div class="dpi-forms__dynamic-modals" data-formsection="2">
    <p class="dpi-forms__dynamic-modals_heading">
      I would like to notify the following person(s) of my gift 
      <br /> 
      (amounts are confidential)
    </p>
    <div class="dpi-forms__fields-wrapper">
      <label class="dpi-forms__label dpi-forms__label-full_width">
        <p class="dpi-forms__label-title">Add a person</p>
        <button class="dpi-forms__field-btn dpi-forms__field-btn_primary" data-action="add_person">
          <svg class="dpi-forms__btn-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90.8 84.5"><path d="M45.4 53.2c14.7 0 26.6-11.9 26.6-26.6C72 11.9 60.1 0 45.4 0 30.7 0 18.8 11.9 18.8 26.6 18.8 41.3 30.7 53.2 45.4 53.2zM45.4 8c10.3 0 18.6 8.3 18.6 18.6 0 10.3-8.3 18.6-18.6 18.6 -10.3 0-18.6-8.3-18.6-18.6C26.8 16.3 35.1 8 45.4 8z"/><path d="M57.7 55.6c-1.3-0.4-2.7-0.1-3.8 0.8L45.4 63.6l-8.5-7.2c-1-0.9-2.5-1.2-3.8-0.8C27.6 57.4 0 66.8 0 80.5c0 2.2 1.8 4 4 4h82.8c2.2 0 4-1.8 4-4C90.8 66.8 63.2 57.4 57.7 55.6zM10.2 76.5c4.4-4.5 14.7-9.5 23.3-12.5l9.4 7.9c1.5 1.3 3.7 1.3 5.2 0l9.4-7.9c8.6 3 18.9 8 23.3 12.5H10.2z"/></svg>
        </button>
      </label>
    </div>
  </div>
  <!-- /dynamic modals -->

  <!-- checkboxes & submit -->
  <div class="dpi-forms__fields" data-formsection="3">
    <div class="dpi-forms__checkbox-wrapper">
      <label class="dpi-forms__label dpi-forms__label-checkbox">
        <input type="checkbox" class="dpi-forms__checkbox" name="addToContributors" />
        <p class="dpi-forms__label-title">I prefer that my name not appear on a list of contributors.</p>
      </label>
      <label class="dpi-forms__label dpi-forms__label-checkbox">
        <input type="checkbox" class="dpi-forms__checkbox" name="moreInfo" />
        <p class="dpi-forms__label-title">I would like more information about Planned Giving or establishing a Named Fund.</p>
      </label>
    </div>
    <div class="dpi-forms__fields-wrapper">
      <button class="dpi-forms__field-btn dpi-forms__field-btn_success dpi-forms__submit">
        Donate
      </button>
    </div>
  </div>
  <!-- /checkboxes & submit -->

  <!-- paypal submit -->
  <form class="dpi-forms__paypal-submit" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="business" value="peter.esser3@gmail.com">
    <input type="hidden" name="cmd" value="_donations">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="tax" value="0">
  </form>
  <!-- /paypal submit  -->

  </div>
  <!-- /wrapper -->

</div>

<?php

wp_enqueue_style(
    'dpi-ppf-reset-css', 
    plugins_url('../css/reset.css', __FILE__), 
    null, 
    filemtime(plugin_dir_path(dirname(__FILE__)) . 'css/reset.css'), 
    'all'
);

wp_enqueue_style(
    'dpi-ppf-form-css', 
    plugins_url('../css/form.css', __FILE__), 
    null, 
    filemtime(plugin_dir_path(dirname(__FILE__)) . 'css/form.css'), 
    'all'
);

wp_enqueue_script(
    'dpi-ppf-form-js', 
    plugins_url('../js/form.js', __FILE__), 
    null, 
    filemtime(plugin_dir_path(dirname(__FILE__)) . 'js/form.js'), 
    true
);

wp_footer();

?>

<script>
  window.dpiPPF.init({
    namespace: '.dpi-forms__',
    id: '<?php echo bin2hex(openssl_random_pseudo_bytes(5)) ?>'
  });
</script>