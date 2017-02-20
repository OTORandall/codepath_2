<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  echo "no id! ";
}
$id = $_GET['id'];
$users_result = find_user_by_id($id);
$user = db_fetch_assoc($users_result);

$errors = array();

if(is_post_request()){
  $response = $_POST['response'];
  $result = is_valid_response($response);
  if($result === true){
    if( $response == 'y'){
      $result = delete_user($user);
      if($result === true){
        redirect_to('index.php');
      }
    }
    else{
      redirect_to('show.php?id=' . u(h($user['id'])));
    }
  }
  $errors[] = "Please enter 'y' as yes and 'n' as no .";

}

?>


<h1>User: <?php echo h($user['first_name']) . " " . h($user['last_name']); ?></h1>

<?php echo display_errors($errors); ?>

<form action="delete.php?id=<?php echo u(h($user['id'])); ?>" method="post">
  Are you sure you want to permanently delete the user:
  <br />
  <br />
  <input type=text name=response placeholder="y/n"/>
  <input type="submit" name="submit" value="submit" />
</form>
