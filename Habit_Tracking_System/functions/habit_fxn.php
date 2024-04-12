<?php

require_once("../actions/get_habits_info_action.php"); // Include the action file

// add core to get user id
require_once("../settings/core.php");

$username = $_SESSION['username'];
$userId = get_user_id($username);

$var_data = get_all_habits($userId); // Get all chores data

if (!empty($var_data)) {   // If not empty
  
?>


<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="../css/Habit.css">
  <link rel="stylesheet" href="../css/table.css">

  <script src="https://kit.fontawesome.com/3035b793a0.js" crossorigin="anonymous"></script>

</head>

<body>

<table>

  <thead>
    <tr>
      <th>Habit</th>
      <th>Reminer Type</th>
      <th>Reminer Time</th>
      <th>Reminer Start Day</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>

    <?php foreach ($var_data as $habit): ?>
      <?php if (isset($habit)): ?>
      <tr>

        <td> <?php echo $habit["habitName"]; ?> </td>

        <td> <?php echo $habit["reminderType"]; ?> </td>

        <td> <?php echo $habit["reminderTime"]; ?> </td>

        <td> <?php echo $habit["reminderDay"]; ?> </td>

        <td>
          <a href="../view/edit_habit_view.php?habitID=<?php echo $habit["habitID"]; ?>" class="edit-chore" data-id=" <?php $habit["habitID"]; ?> "> <i class="fa-solid fa-pen-to-square"></i> </a>
          &nbsp;
          <a href="../actions/delete_habit_action.php?cid=<?php echo $habit["habitID"]; ?>" class="delete-chore" data-id="<?php $habit["habitID"]; ?>"> <i class="fa-solid fa-trash"></i> </a>
        </td>

      </tr>

      <?php endif; ?>
    <?php endforeach; ?>

  </tbody>

</table>
  
</body>

</html>
  
<?php

}
else {
  echo "<p>You do not have any habits yet.</p>";
}

