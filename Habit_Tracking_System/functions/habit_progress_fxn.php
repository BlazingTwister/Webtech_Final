<?php

require_once("../actions/get_habits_info_action.php"); // Include the action file


$var_data = get_all_habits_progress($userId);

if (!empty($var_data)) {   // If not empty
  
?>


<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="../css/Habit.css">
  <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/progress.css">

  <script src="https://kit.fontawesome.com/3035b793a0.js" crossorigin="anonymous"></script>
</head>

<body>

<table>

  <thead>
    <tr>
      <th>Habit</th>
      <th>Date Started</th>
      <th>Completion</th>
      <th>Status</th>
      <th>Mark as complete</th>
    </tr>
  </thead>

  <tbody>

    <?php foreach ($var_data as $progress): ?>
      <?php if (isset($progress)): 
        ?>

        
      <tr>

        <td> <?php echo $progress["habitName"]; ?> </td>

        <td> <?php echo $progress["sDate"]; ?> </td>

        <td> 

          <!--Progress Bar-->
          <?php

            $completionPercentage = $progress["completionPercentage"];

          ?>
          <div class="progress-container">
              <div class="progress-bar" style="width: <?php echo $completionPercentage; ?>%;"></div>
          </div>

          <?php echo $progress["completionPercentage"]."%"; ?> 

        </td>

        <td> <?php echo $progress["completionStat"]; ?> </td>

        <td>
          <a href="../actions/mark_progress_action.php?progressID=<?php echo $progress["progressID"]; ?>" class="mark-process" data-id=" <?php echo $progress["progressID"]; ?> "> mark as complete <i class="fa-solid fa-check"></i> </a>
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
  $_SESSION["message"] = "Try setting some goals";

  echo "<p>Set some goals to view their progress. </p>";
}
