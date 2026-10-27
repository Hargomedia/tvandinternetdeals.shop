<?php include 'header.php'; ?>

<section class="contact-section">
  <h2 class="contact-title">Get in Touch</h2>
  <div class="contact-wrapper">
    
<?php
$sent = false;
if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST["website"])) {
  $n = trim(strip_tags($_POST["name"] ?? ""));
  $e = filter_var($_POST["email"] ?? "", FILTER_VALIDATE_EMAIL);
  $m = trim(strip_tags($_POST["message"] ?? ""));
  if ($n && $e && $m) {
    $subject = "Website enquiry from " . preg_replace('/[\r\n]+/', ' ', $n);
    $headers = "From: support@tvandinternetdeals.shop\r\nReply-To: " . $e;
    $sent = mail("support@tvandinternetdeals.shop", $subject, $m, $headers);
  }
}
?>
    <form class="contact-form" method="post" action="support.php">
      <?php if ($sent): ?><p><b>Thank you. We will get back to you shortly.</b></p><?php endif; ?>
      <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off" />
      <input type="text" name="name" placeholder="Your Name" required />
      <input type="email" name="email" placeholder="Your Email" required />
      <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
      <button type="submit">Send Message</button>
    </form>

    <div class="contact-info">
      <h3>Contact Information</h3>
      <p>242 Greene St, New York, NY 10003, USA</p>
      <p>+1 (877) 412-0493</p>
      <p>✉️ support@tvandinternetdeals.shop</p>
      
      <!-- Google Map -->
      <div class="map-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.834915237805!2d-73.9981850845932!3d40.72416327932803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a6d72a9fcd%3A0x25a5e1bfa1a0f0bb!2s242%20Greene%20St%2C%20New%20York%2C%20NY%2010003%2C%20USA!5e0!3m2!1sen!2sin!4v1697428680000!5m2!1sen!2sin"
          width="100%"
          height="250"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

    </div>

  </div>
</section>




<?php include 'footer.php'; ?>