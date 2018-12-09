{"changed":false,"filter":false,"title":"newassignment.php","tooltip":"/newassignment.php","value":"<?php \ninclude 'core/init.php';\n\n$username = $_COOKIE[\"Username\"];\n$password = $_COOKIE[\"Password\"];\n\n$assnName = $_POST[\"assnName\"];\n$assnDue = $_POST[\"assnDue\"];\n$courseId = $_GET['courseId'];\n\nif (empty($username) || empty($password))\n{\n    //not logged in\n    echo \"No username or password\";\n} else if (!empty($assnName) && !empty($assnDue))\n{\n    if (auth($username, $password))\n    {\n        $userId = find_id($username, $password);\n        if (courseIdMatch($userId, $courseId))\n        {\n            $currDate = date('Y/m/d');\n    \n            $insert = \"INSERT INTO tblAssignments (ID_Courses, Assignment_Name, Assignment_Deadline, Assignment_Creation)\n            VALUES ('$courseId', '$assnName', '$assnDue','$currDate')\";\n            if ($mysqli->query($insert) == true)\n            {\n                echo \"Assignment creation successful\";\n            } else {\n                echo \"Assignment creation failed.\";\n            }\n        }\n    } else {\n        echo \"Log in failed\";\n    }\n} else {\n    echo \"Assn info empty\";\n}\n\ninclude 'includes/full/header.php';?>\n<div class=\"col-md-4 offset-md-4 text-center\" style=\"margin-top: 350px\">\n    <h3 class=\"h3 mb-3 font-weight-normal\">Create New Assignment</h1></br>\n    <form action=\"<?php echo \"newassignment.php?courseId= \" . $courseId ?>\" method=\"post\">\n        <input type=\"text\" name=\"assnName\" class=\"form-control\" placeholder=\"Assignment Name\"></br>\n        <label>Due Date</label>\n        <input type=\"date\" name=\"assnDue\"class=\"form-control\" placeholder=\"Assignment Name\"></br>\n        <input type=\"submit\" value=\"Create\" class=\"buttons btn btn-lg btn-primary btn-block\"></br>\n    </form>\n</div>\n<?php include 'includes/full/footer.php';?>","undoManager":{"mark":-1,"position":-1,"stack":[]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":21,"column":38},"end":{"row":21,"column":38},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1543241371980}