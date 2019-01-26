<?php
/**
 * Template Name: Contact Page
 */
 ?>

 <article>
   <section class="info">
     <div class="contact-info">
       <ul>
         <li class="email"><a href="mailto:ask@ctking.com">ask@ctking.com</a></li>
         <li class="phone"><a href="tel:1234567890">(404) 233-2145</a></li>
         <li class="staff-dir"><a href="/clergy-staff/">Parish Clergy & Staff Contact Info</a></li>
         <li class="address">
           <div>
             <p>Cathedral of Christ the King</p>
             <p>2699 Peachtree Rd. NE</p>
             <p>Atlanta, GA 30305</p>
           </div>
         </li>
       </ul>
     </div>
     <div class="contact-form">
       <?php echo do_shortcode( '[contact-form-7 id="20891" title="Contact form 1"]' ); ?>
     </div>
   </section>
   <section class="map">
     <div class="iframe-container">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3314.3902391330175!2d-84.38914218479083!3d33.82804548066753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f50599cac77123%3A0x41050a880cfdbd44!2s2699+Peachtree+Rd+NE%2C+Atlanta%2C+GA+30305!5e0!3m2!1sen!2sus!4v1486486106530" frameborder="0" style="border:0" allowfullscreen></iframe>
     </div>
   </section>
 </article>
