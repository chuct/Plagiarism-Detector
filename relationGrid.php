<?php
include 'core/init.php';
$courseId = $_GET["courseId"];
$assnId = $_GET["assnId"];

$headerCount = 0;
$rowCount = 0;
$query = "SELECT * FROM tblStudents where ID_Courses = '$courseId' ORDER BY Last_Name";
$result = mysqli_query($mysqli, $query);

echo "<table border = 1>";
echo "<th></th>";
while ($row = mysqli_fetch_array($result))
{
    echo "<th>" . $row['Last_Name'] . "</td>";
    $headerCount = $headerCount + 1;
}

mysqli_data_seek($result, 0);

while ($row = mysqli_fetch_array($result))
{
    $rowCount = $rowCount + 1;
    echo "<tr>";
    echo "<td>" . $row['Last_Name'] . "</td>";
    $count = 0;
    while ($count < $headerCount)
    {
        $plagScore = rand(0,40);
        $count = $count + 1;
        if ($count == $rowCount)
        {
            echo "<td> 100% </td>";
        } else {
            echo "<td>" . $plagScore . "%</td>";
        }
        
    }
    echo "</tr>";
}
echo "</table>";

?>