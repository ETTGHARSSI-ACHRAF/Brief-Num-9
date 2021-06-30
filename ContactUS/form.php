

      <form method="post" >
            <label>Full Name :</label>
            <input type="text" name="fullname"   placeholder="Full name " /><br>
         
            <label>Email :</label>
            <input type="email" name="email"   placeholder="Email" /><br>
          
            <label>subject :</label>
            <input type="text" name="subject"   placeholder="Subject" /><br>
         
            <label>content :</label>
            <textarea name="content"   placeholder="Your Message"></textarea><br>
          
            
              <input type="submit" name="save" value="Save" class="button-primary"  />
       
      </form>

<?php

if(isset($_POST['save'])){
    insert_data();
}




function insert_data(){

  global $wpdb;
    $fullName=$_POST['fullname'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $content=$_POST['content'];


    if( empty($fullName) || empty($email) || empty($subject) || empty($content))
    {
     echo '<h1 style="color:red;">All fields are required</h1>';

    }
    else
    {
       
        $table=$wpdb->prefix.'ContactUs';
        $wpdb->insert(
          $table,
          array(
              'fullname' => $fullName,
              'email' => $email,
              'subjecte' => $subject,
              'content' => $content
          )
      ); 
         wp_redirect($_SERVER['REQUEST_URI']);
         exit();

    }
}

?>