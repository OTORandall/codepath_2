<?php
require_once('../../../private/initialize.php');

$errors = array();
$territory = array(
  'name' => '',
  'position' => '',
  'state_id' => ''
);

//$state_id = $_GET['id'];
//$territory['state_id'] = $state_id;
//echo  $territory['state_id'];
//echo $state_id;
if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $territory['name'] = $_POST['name']; }
  if(isset($_POST['position'])) { $territory['position'] = $_POST['position']; }
  // the state_id will be in the url, so we use get method to retrive it
  if(isset($_GET['state_id'])) { $territory['state_id'] = $_GET['state_id']; }

  //is_valid_position($territory['position']);
  $result = insert_territory($territory);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . u($new_id));
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New Territory'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../states/show.php?id=<?php echo u(h($_GET['id']));?>">Back to State Details</a><br />

  <h1>New Territory</h1>

  <!-- TODO add form -->
  <?php echo display_errors($errors); ?>
  <form action="new.php?state_id=<?php echo u(h($_GET['id']));?>" method="post">
    Name:<br />
    <input type="text" name="name" value="<?php echo h($territory['name']); ?>" /><br />
    Position:<br />
    <input type="text" name="position" value="<?php echo h($territory['position']); ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Create"  />
  </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
