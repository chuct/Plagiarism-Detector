{"filter":false,"title":"assignments.php","tooltip":"/assignments.php","undoManager":{"mark":49,"position":49,"stack":[[{"start":{"row":27,"column":112},"end":{"row":27,"column":116},"action":"insert","lines":["    "],"id":2}],[{"start":{"row":27,"column":68},"end":{"row":27,"column":69},"action":"remove","lines":[" "],"id":3}],[{"start":{"row":27,"column":102},"end":{"row":27,"column":103},"action":"remove","lines":[" "],"id":4}],[{"start":{"row":16,"column":52},"end":{"row":17,"column":0},"action":"insert","lines":["",""],"id":5},{"start":{"row":17,"column":0},"end":{"row":17,"column":12},"action":"insert","lines":["            "]},{"start":{"row":17,"column":12},"end":{"row":18,"column":0},"action":"insert","lines":["",""]},{"start":{"row":18,"column":0},"end":{"row":18,"column":12},"action":"insert","lines":["            "]},{"start":{"row":18,"column":12},"end":{"row":19,"column":0},"action":"insert","lines":["",""]},{"start":{"row":19,"column":0},"end":{"row":19,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":17,"column":12},"end":{"row":18,"column":0},"action":"insert","lines":["",""],"id":6},{"start":{"row":18,"column":0},"end":{"row":18,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":18,"column":12},"end":{"row":23,"column":21},"action":"insert","lines":["                    if ($mysqli->query($insert) == true)","                    {","                        //echo \"comparison creation successful\";","                    } else {","                        //echo \"comparison creation failed.\";","                    }"],"id":7}],[{"start":{"row":18,"column":51},"end":{"row":18,"column":58},"action":"remove","lines":["$insert"],"id":8},{"start":{"row":18,"column":51},"end":{"row":18,"column":57},"action":"insert","lines":["$query"]}],[{"start":{"row":18,"column":28},"end":{"row":18,"column":32},"action":"remove","lines":["    "],"id":9},{"start":{"row":18,"column":24},"end":{"row":18,"column":28},"action":"remove","lines":["    "]},{"start":{"row":18,"column":20},"end":{"row":18,"column":24},"action":"remove","lines":["    "]}],[{"start":{"row":20,"column":25},"end":{"row":20,"column":26},"action":"remove","lines":["/"],"id":10},{"start":{"row":20,"column":24},"end":{"row":20,"column":25},"action":"remove","lines":["/"]}],[{"start":{"row":22,"column":24},"end":{"row":22,"column":25},"action":"remove","lines":["/"],"id":11}],[{"start":{"row":22,"column":24},"end":{"row":22,"column":25},"action":"remove","lines":["/"],"id":12}],[{"start":{"row":18,"column":0},"end":{"row":24,"column":12},"action":"remove","lines":["                    if ($mysqli->query($query) == true)","                    {","                        echo \"comparison creation successful\";","                    } else {","                        echo \"comparison creation failed.\";","                    }","            "],"id":13}],[{"start":{"row":17,"column":12},"end":{"row":18,"column":0},"action":"remove","lines":["",""],"id":14}],[{"start":{"row":17,"column":12},"end":{"row":18,"column":12},"action":"remove","lines":["","            "],"id":15}],[{"start":{"row":17,"column":12},"end":{"row":23,"column":21},"action":"remove","lines":["","                    if ($mysqli->query($query) == true)","                    {","                        echo \"comparison creation successful\";","                    } else {","                        echo \"comparison creation failed.\";","                    }"],"id":17}],[{"start":{"row":14,"column":9},"end":{"row":15,"column":0},"action":"insert","lines":["",""],"id":18},{"start":{"row":15,"column":0},"end":{"row":15,"column":12},"action":"insert","lines":["            "]},{"start":{"row":15,"column":12},"end":{"row":16,"column":0},"action":"insert","lines":["",""]},{"start":{"row":16,"column":0},"end":{"row":16,"column":12},"action":"insert","lines":["            "]},{"start":{"row":16,"column":12},"end":{"row":17,"column":0},"action":"insert","lines":["",""]},{"start":{"row":17,"column":0},"end":{"row":17,"column":12},"action":"insert","lines":["            "]},{"start":{"row":17,"column":12},"end":{"row":18,"column":0},"action":"insert","lines":["",""]},{"start":{"row":18,"column":0},"end":{"row":18,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":15,"column":12},"end":{"row":25,"column":72},"action":"insert","lines":["                    $query = \"SELECT Assignment_Name FROM tblAssignments","                    WHERE ID_Assignments = '$assnId' LIMIT 1\";","                    ","                    ","                    $result = mysqli_query($mysqli, $query);","                    while ($row = mysqli_fetch_array($result))","                    {","                        $assnName = $row['Assignment_Name'];","                    }","                    ","                    echo \"<h2>Assignment : \" . $assnName . \"</h2><br>\"; "],"id":19}],[{"start":{"row":15,"column":28},"end":{"row":15,"column":32},"action":"remove","lines":["    "],"id":20},{"start":{"row":15,"column":24},"end":{"row":15,"column":28},"action":"remove","lines":["    "]},{"start":{"row":15,"column":20},"end":{"row":15,"column":24},"action":"remove","lines":["    "]}],[{"start":{"row":15,"column":0},"end":{"row":15,"column":4},"action":"remove","lines":["    "],"id":21},{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"remove","lines":["    "]},{"start":{"row":17,"column":0},"end":{"row":17,"column":4},"action":"remove","lines":["    "]},{"start":{"row":18,"column":0},"end":{"row":18,"column":4},"action":"remove","lines":["    "]},{"start":{"row":19,"column":0},"end":{"row":19,"column":4},"action":"remove","lines":["    "]},{"start":{"row":20,"column":0},"end":{"row":20,"column":4},"action":"remove","lines":["    "]},{"start":{"row":21,"column":0},"end":{"row":21,"column":4},"action":"remove","lines":["    "]},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"remove","lines":["    "]},{"start":{"row":23,"column":0},"end":{"row":23,"column":4},"action":"remove","lines":["    "]},{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"remove","lines":["    "]},{"start":{"row":25,"column":0},"end":{"row":25,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":15,"column":0},"end":{"row":15,"column":4},"action":"remove","lines":["    "],"id":22},{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"remove","lines":["    "]},{"start":{"row":17,"column":0},"end":{"row":17,"column":4},"action":"remove","lines":["    "]},{"start":{"row":18,"column":0},"end":{"row":18,"column":4},"action":"remove","lines":["    "]},{"start":{"row":19,"column":0},"end":{"row":19,"column":4},"action":"remove","lines":["    "]},{"start":{"row":20,"column":0},"end":{"row":20,"column":4},"action":"remove","lines":["    "]},{"start":{"row":21,"column":0},"end":{"row":21,"column":4},"action":"remove","lines":["    "]},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"remove","lines":["    "]},{"start":{"row":23,"column":0},"end":{"row":23,"column":4},"action":"remove","lines":["    "]},{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"remove","lines":["    "]},{"start":{"row":25,"column":0},"end":{"row":25,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":15,"column":29},"end":{"row":15,"column":44},"action":"remove","lines":["Assignment_Name"],"id":23},{"start":{"row":15,"column":29},"end":{"row":15,"column":30},"action":"insert","lines":["C"]},{"start":{"row":15,"column":30},"end":{"row":15,"column":31},"action":"insert","lines":["o"]},{"start":{"row":15,"column":31},"end":{"row":15,"column":32},"action":"insert","lines":["u"]}],[{"start":{"row":15,"column":29},"end":{"row":15,"column":32},"action":"remove","lines":["Cou"],"id":24},{"start":{"row":15,"column":29},"end":{"row":15,"column":40},"action":"insert","lines":["Course_Name"]}],[{"start":{"row":15,"column":46},"end":{"row":15,"column":60},"action":"remove","lines":["tblAssignments"],"id":25},{"start":{"row":15,"column":46},"end":{"row":15,"column":47},"action":"insert","lines":["t"]},{"start":{"row":15,"column":47},"end":{"row":15,"column":48},"action":"insert","lines":["b"]},{"start":{"row":15,"column":48},"end":{"row":15,"column":49},"action":"insert","lines":["l"]},{"start":{"row":15,"column":49},"end":{"row":15,"column":50},"action":"insert","lines":["C"]},{"start":{"row":15,"column":50},"end":{"row":15,"column":51},"action":"insert","lines":["o"]},{"start":{"row":15,"column":51},"end":{"row":15,"column":52},"action":"insert","lines":["u"]},{"start":{"row":15,"column":52},"end":{"row":15,"column":53},"action":"insert","lines":["r"]},{"start":{"row":15,"column":53},"end":{"row":15,"column":54},"action":"insert","lines":["s"]},{"start":{"row":15,"column":54},"end":{"row":15,"column":55},"action":"insert","lines":["e"]},{"start":{"row":15,"column":55},"end":{"row":15,"column":56},"action":"insert","lines":["s"]}],[{"start":{"row":16,"column":18},"end":{"row":16,"column":32},"action":"remove","lines":["ID_Assignments"],"id":26},{"start":{"row":16,"column":18},"end":{"row":16,"column":19},"action":"insert","lines":["I"]},{"start":{"row":16,"column":19},"end":{"row":16,"column":20},"action":"insert","lines":["D"]}],[{"start":{"row":16,"column":18},"end":{"row":16,"column":20},"action":"remove","lines":["ID"],"id":27},{"start":{"row":16,"column":18},"end":{"row":16,"column":28},"action":"insert","lines":["ID_Courses"]}],[{"start":{"row":16,"column":32},"end":{"row":16,"column":39},"action":"remove","lines":["$assnId"],"id":28},{"start":{"row":16,"column":32},"end":{"row":16,"column":33},"action":"insert","lines":["#"]}],[{"start":{"row":16,"column":32},"end":{"row":16,"column":33},"action":"remove","lines":["#"],"id":29}],[{"start":{"row":16,"column":32},"end":{"row":16,"column":33},"action":"insert","lines":["$"],"id":30},{"start":{"row":16,"column":33},"end":{"row":16,"column":34},"action":"insert","lines":["c"]}],[{"start":{"row":16,"column":32},"end":{"row":16,"column":34},"action":"remove","lines":["$c"],"id":31},{"start":{"row":16,"column":32},"end":{"row":16,"column":41},"action":"insert","lines":["$courseId"]}],[{"start":{"row":22,"column":34},"end":{"row":22,"column":49},"action":"remove","lines":["Assignment_Name"],"id":32},{"start":{"row":22,"column":34},"end":{"row":22,"column":35},"action":"insert","lines":["C"]},{"start":{"row":22,"column":35},"end":{"row":22,"column":36},"action":"insert","lines":["o"]},{"start":{"row":22,"column":36},"end":{"row":22,"column":37},"action":"insert","lines":["u"]},{"start":{"row":22,"column":37},"end":{"row":22,"column":38},"action":"insert","lines":["r"]},{"start":{"row":22,"column":38},"end":{"row":22,"column":39},"action":"insert","lines":["s"]},{"start":{"row":22,"column":39},"end":{"row":22,"column":40},"action":"insert","lines":["e"]}],[{"start":{"row":22,"column":34},"end":{"row":22,"column":40},"action":"remove","lines":["Course"],"id":33},{"start":{"row":22,"column":34},"end":{"row":22,"column":45},"action":"insert","lines":["Course_Name"]}],[{"start":{"row":22,"column":17},"end":{"row":22,"column":21},"action":"remove","lines":["assn"],"id":34},{"start":{"row":22,"column":17},"end":{"row":22,"column":18},"action":"insert","lines":["c"]},{"start":{"row":22,"column":18},"end":{"row":22,"column":19},"action":"insert","lines":["o"]},{"start":{"row":22,"column":19},"end":{"row":22,"column":20},"action":"insert","lines":["u"]},{"start":{"row":22,"column":20},"end":{"row":22,"column":21},"action":"insert","lines":["r"]},{"start":{"row":22,"column":21},"end":{"row":22,"column":22},"action":"insert","lines":["s"]},{"start":{"row":22,"column":22},"end":{"row":22,"column":23},"action":"insert","lines":["e"]}],[{"start":{"row":25,"column":39},"end":{"row":25,"column":48},"action":"remove","lines":["$assnName"],"id":35},{"start":{"row":25,"column":39},"end":{"row":25,"column":50},"action":"insert","lines":["$courseName"]}],[{"start":{"row":25,"column":22},"end":{"row":25,"column":32},"action":"remove","lines":["Assignment"],"id":36},{"start":{"row":25,"column":22},"end":{"row":25,"column":23},"action":"insert","lines":["C"]},{"start":{"row":25,"column":23},"end":{"row":25,"column":24},"action":"insert","lines":["o"]},{"start":{"row":25,"column":24},"end":{"row":25,"column":25},"action":"insert","lines":["u"]},{"start":{"row":25,"column":25},"end":{"row":25,"column":26},"action":"insert","lines":["r"]},{"start":{"row":25,"column":26},"end":{"row":25,"column":27},"action":"insert","lines":["s"]},{"start":{"row":25,"column":27},"end":{"row":25,"column":28},"action":"insert","lines":["e"]}],[{"start":{"row":25,"column":22},"end":{"row":25,"column":28},"action":"remove","lines":["Course"],"id":37},{"start":{"row":25,"column":22},"end":{"row":25,"column":23},"action":"insert","lines":["A"]},{"start":{"row":25,"column":23},"end":{"row":25,"column":24},"action":"insert","lines":["s"]},{"start":{"row":25,"column":24},"end":{"row":25,"column":25},"action":"insert","lines":["s"]},{"start":{"row":25,"column":25},"end":{"row":25,"column":26},"action":"insert","lines":["i"]},{"start":{"row":25,"column":26},"end":{"row":25,"column":27},"action":"insert","lines":["g"]},{"start":{"row":25,"column":27},"end":{"row":25,"column":28},"action":"insert","lines":["n"]}],[{"start":{"row":25,"column":28},"end":{"row":25,"column":29},"action":"insert","lines":["m"],"id":38},{"start":{"row":25,"column":29},"end":{"row":25,"column":30},"action":"insert","lines":["e"]},{"start":{"row":25,"column":30},"end":{"row":25,"column":31},"action":"insert","lines":["n"]},{"start":{"row":25,"column":31},"end":{"row":25,"column":32},"action":"insert","lines":["t"]}],[{"start":{"row":25,"column":32},"end":{"row":25,"column":33},"action":"insert","lines":[" "],"id":39},{"start":{"row":25,"column":33},"end":{"row":25,"column":34},"action":"insert","lines":["L"]},{"start":{"row":25,"column":34},"end":{"row":25,"column":35},"action":"insert","lines":["i"]},{"start":{"row":25,"column":35},"end":{"row":25,"column":36},"action":"insert","lines":["s"]},{"start":{"row":25,"column":36},"end":{"row":25,"column":37},"action":"insert","lines":["t"]}],[{"start":{"row":25,"column":37},"end":{"row":25,"column":38},"action":"insert","lines":[" "],"id":40},{"start":{"row":25,"column":38},"end":{"row":25,"column":39},"action":"insert","lines":["f"]},{"start":{"row":25,"column":39},"end":{"row":25,"column":40},"action":"insert","lines":["o"]},{"start":{"row":25,"column":40},"end":{"row":25,"column":41},"action":"insert","lines":["r"]}],[{"start":{"row":25,"column":41},"end":{"row":25,"column":42},"action":"remove","lines":[" "],"id":41},{"start":{"row":25,"column":41},"end":{"row":25,"column":42},"action":"remove","lines":[":"]}],[{"start":{"row":25,"column":33},"end":{"row":25,"column":34},"action":"remove","lines":["L"],"id":42},{"start":{"row":25,"column":33},"end":{"row":25,"column":34},"action":"insert","lines":["l"]}],[{"start":{"row":38,"column":34},"end":{"row":39,"column":0},"action":"insert","lines":["",""],"id":43},{"start":{"row":39,"column":0},"end":{"row":39,"column":12},"action":"insert","lines":["            "]},{"start":{"row":39,"column":12},"end":{"row":39,"column":13},"action":"insert","lines":["<"]}],[{"start":{"row":39,"column":13},"end":{"row":39,"column":14},"action":"insert","lines":["t"],"id":44},{"start":{"row":39,"column":14},"end":{"row":39,"column":15},"action":"insert","lines":["h"]},{"start":{"row":39,"column":15},"end":{"row":39,"column":16},"action":"insert","lines":[">"]}],[{"start":{"row":39,"column":16},"end":{"row":39,"column":17},"action":"insert","lines":[" "],"id":45}],[{"start":{"row":39,"column":16},"end":{"row":39,"column":17},"action":"remove","lines":[" "],"id":46}],[{"start":{"row":39,"column":16},"end":{"row":39,"column":17},"action":"insert","lines":["E"],"id":47},{"start":{"row":39,"column":17},"end":{"row":39,"column":18},"action":"insert","lines":["a"]},{"start":{"row":39,"column":18},"end":{"row":39,"column":19},"action":"insert","lines":["m"]},{"start":{"row":39,"column":19},"end":{"row":39,"column":20},"action":"insert","lines":["i"]},{"start":{"row":39,"column":20},"end":{"row":39,"column":21},"action":"insert","lines":["l"]}],[{"start":{"row":39,"column":21},"end":{"row":39,"column":22},"action":"insert","lines":[" "],"id":48}],[{"start":{"row":39,"column":21},"end":{"row":39,"column":22},"action":"remove","lines":[" "],"id":49}],[{"start":{"row":39,"column":16},"end":{"row":39,"column":21},"action":"remove","lines":["Eamil"],"id":50}],[{"start":{"row":39,"column":16},"end":{"row":39,"column":17},"action":"insert","lines":["E"],"id":51},{"start":{"row":39,"column":17},"end":{"row":39,"column":18},"action":"insert","lines":["m"]},{"start":{"row":39,"column":18},"end":{"row":39,"column":19},"action":"insert","lines":["a"]},{"start":{"row":39,"column":19},"end":{"row":39,"column":20},"action":"insert","lines":["i"]},{"start":{"row":39,"column":20},"end":{"row":39,"column":21},"action":"insert","lines":["l"]}],[{"start":{"row":39,"column":21},"end":{"row":39,"column":22},"action":"insert","lines":[" "],"id":52}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":8,"column":36},"end":{"row":8,"column":36},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1543288291465,"hash":"787c1787a66111b3e40bee508ee0e3cf0fd73fb9"}