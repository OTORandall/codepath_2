<?php require_once('../../../private/initialize.php'); ?>

<?php
if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = $_GET['id'];
$countries_result = find_country_by_id($id);
// No loop, only one result
$country = db_fetch_assoc($countries_result);




?>

<?php $page_title = 'Staff: Country of ' . h($country['name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to List</a><br />

  <h1>Counry: <?php echo h($country['name']); ?></h1>

  <?php
    echo "<table id=\"country\">";
    echo "<tr>";
    echo "<td>Name: </td>";
    echo "<td>" . h($country['name']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Code: </td>";
    echo "<td>" . h($country['code']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Country ID: </td>";
    echo "<td>" . h($country['id']) . "</td>";
    echo "</tr>";
    echo "</table>";
?>
    <br />
    <a href="edit.php?id=<?php echo u(h($country['id'])); ?>" >Edit</a><br />
    <hr />

    <h2>States</h2>
    <br />

    <!-- put the id of the country in the url so that we can retrive all the states under the same country -->
    <a href="../states/new.php?id=<?php echo u(h($country['id'])); ?>">Add a State</a><br />
    <!-- add a state will bring us to the new php of
    states -->

<?php
    // first we need to show the list of the states
    // as it shown in the state/index.php before

    $states_result =  find_states_for_country_id($country['id']);

    echo "<table id=\"states\" style=\"width: 500px;\">";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Code</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";
    while($state = db_fetch_assoc($states_result)) {
      echo "<tr>";
      echo "<td>" . h($state['name']) . "</td>";
      echo "<td>" . h($state['code']) . "</td>";
      echo "<td>";
      echo "<a href=\"../states/show.php?id=". u(h($state['id'])). "\">Show</a>";
      echo "</td>";
      echo "<td>";
      echo "<a href=\"../states/edit.php?id=". u(h($state['id'])). "\">Edit</a>";
      echo "</td>";
      echo "</tr>";
    } // end while $territory
    db_free_result($states_result);
    echo "</ul>"; // #territories

    db_free_result($countries_result);
  ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
