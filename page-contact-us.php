<?php

  //response generation function

  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $subjectLine = $_POST['message_subject'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = $subjectLine;
  $headers = 'From: '.$name.'<'.$email .'>'."\r\n" .
    'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

?>

<?php get_header('mini'); ?>

  <div id="primary" class="site-content">
    <div id="content" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
              <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
              <?php the_content(); ?>

              <style type="text/css">
                .error{
                  padding: 5px 9px;
                  border: 1px solid red;
                  color: red;
                  border-radius: 3px;
                }

                .success{
                  padding: 5px 9px;
                  border: 1px solid green;
                  color: green;
                  border-radius: 3px;
                }

                form span{
                  color: red;
                }
              </style>

        <div id="theform">
                <?php echo $response; ?>
        <form action="<?php the_permalink(); ?>" method="post">
          <fieldset>
            <ul>
              <li class="field"><input class="input" type="text" name="message_name" placeholder="Your Name" value="<?php echo esc_attr($_POST['message_name']); ?>"/></li>
              <li class="field"><input class="input" type="email" name="message_email" placeholder="Email Address" value="<?php echo esc_attr($_POST['message_email']); ?>"/></li>
              <li class="field"><input class="input" type="text" name="message_subject" placeholder="Subject" value="<?php echo esc_attr($_POST['message_subject']); ?>"/></li>
              <li class="field"><textarea class ="input textarea" name="message_text" rows="6" placeholder="Let's Talk..." ><?php echo esc_textarea($_POST['message_text']); ?></textarea></li><br />
              <li class="field"><input class="xnarrow text input" type="text" placeholder="Hmmm..." name="message_human"> + 3 = 5</li>
              <li class="field"><input type="hidden" name="submitted" value="1"></li>
              <div class="medium danger btn"><input type="submit" value="Send" /></div>
              <div class="medium info btn"><input type="reset" value="Clear" /></div>
            </ul>
          </fieldset>
        </form>
      </div>

            </div><!-- .entry-content -->

          </article><!-- #post -->

      <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
  </div><!-- #primary -->
<?php get_footer(); ?>