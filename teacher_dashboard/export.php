<?php  
//export.php  
$connect = mysqli_connect("localhost:3307", "root", "", "intern");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM joined_courses";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>id</th>  
                         <th>course_id</th>  
                         <th>student_id</th>  
       <th>teacher_id</th>
       <th>joining_date</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["course_id"].'</td>  
                         <td>'.$row["student_id"].'</td>  
       <td>'.$row["teacher_id"].'</td>  
       <td>'.$row["joining_date"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
