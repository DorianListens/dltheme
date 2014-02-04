<?php get_header('mini'); ?>
<script type="text/javascript" src="http://dorianlistens.com/wrp/wp-includes/js/jquery/jquery.js?ver=1.10.2"></script>
<script type="text/javascript">
jQuery(function($){
$(document).ready(function() {

    $("#submit_btn").click(function() { 
        //get input field values
        var user_name       = $('input[name=message_name]').val(); 
        var user_email      = $('input[name=message_email]').val();
        var user_subject    = $('input[name=message_subject]').val();
        var user_message    = $('textarea[name=message_text]').val();
        var user_human      = $('input[name=message_human]').val();
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        if(user_name==""){ 
            $('input[name=message_name]').parent().addClass('danger'); 
            proceed = false;
        }
        if(user_email==""){ 
            $('input[name=message_email]').parent().addClass('danger');
            proceed = false;
        }
        if(user_subject=="") {    
            $('input[name=message_subject]').parent().addClass('danger');
            proceed = false;
        }
        if(user_message=="") {  
            $('textarea[name=message_text]').parent().addClass('danger'); 
            proceed = false;
        }
        if(user_human==""){ 
            $('input[name=message_human]').parent().addClass('danger'); 
            proceed = false;
        }
        
        //everything looks good! proceed...
        if(proceed) 
        {
            //data to be sent to server
            post_data = {'userName':user_name, 'userEmail':user_email, 'userSubject':user_subject, 'userMessage':user_message, 'userHuman':user_human};
            
            //Ajax post data to server
            $.post('<?php echo get_template_directory_uri(); ?>/the_contacter.php', post_data, function(data){  
                
                //load success massage in #result div element, with slide effect.       
                $("#result").hide().html('<div class="success">'+data+'</div>').slideDown();
                
                //reset values in all input fields
                $('#contact_form input').val(''); 
                $('#contact_form textarea').val(''); 
                
            }).fail(function(err) {  //load any error data
                $("#result").hide().html('<div class="error">'+err.statusText+'</div>').slideDown();
            });
        }
                
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form input, #contact_form textarea").keyup(function() { 
        $("#contact_form li").removeClass('danger'); 
        $("#result").slideUp();
        });    
    });
});
</script>

  <div id="primary" class="site-content">
    <div id="content" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <form>
        <fieldset id="contact_form">
            <legend>To: BigD@dorianlistens.com</legend>
    <div id="result"></div>
            <ul>
              <li class="field"><input class="input" type="text" name="message_name" placeholder="Your Name" minlength="2" required value="<?php echo esc_attr($_POST['message_name']); ?>"/></li>
              <li class="field"><input class="input" type="email" name="message_email" placeholder="Email Address" required value="<?php echo esc_attr($_POST['message_email']); ?>"/></li>
              <li class="field"><input class="input" type="text" name="message_subject" placeholder="Subject" required value="<?php echo esc_attr($_POST['message_subject']); ?>"/></li>
              <li class="field"><textarea class ="input textarea" name="message_text" rows="5" required placeholder="Let's Talk..." ><?php echo esc_textarea($_POST['message_text']); ?></textarea></li><br />
              <li class="field"><input class="narrow text input" type="text" placeholder="Robot?" required name="message_human"> + 3 = 5</li>
              <div class="medium danger btn" id="submit_btn"><a href="#">Send</a></div>
              <!-- <div class="medium info btn"><input type="reset" value="Clear" /></div> -->
            </ul>
          </fieldset>
      </form>
            </div><!-- .entry-content -->

          </article><!-- #post -->

      <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
  </div><!-- #primary -->
  </div> <!-- end #container -->
</body>
</html>

