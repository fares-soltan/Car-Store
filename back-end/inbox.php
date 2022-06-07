<?php
include("../Connection/index.php");
function inbox(){
  global $connect;
    $problems="SELECT * FROM problems ORDER BY id DESC";
    $problems_query=mysqli_query($connect,$problems);
    while($row =mysqli_fetch_array($problems_query)){
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $email=$row['email'];
        $description=$row['description'];
        echo "<tr class=\"unread selected\">
        <td>
            <div class=\"ckbox ckbox-theme\">
                <input id=\"checkbox1\" type=\"checkbox\"  class=\"mail-checkbox\">
                <label for=\"checkbox1\"></label>
            </div>
        </td>
        <td>
            <a href=\"#\" class=\"star star-checked\"><i class=\"fa fa-star\"></i></a>
        </td>
        <td>
            <div class=\"media\">
                <a href=\"#\" class=\"pull-left\">
                    <img alt=\"...\" src=\"https://bootdey.com/img/Content/avatar/avatar1.png\" class=\"media-object\">
                </a>
                <div class=\"media-body\">
                    <h4 class=\"text-primary\">$first_name $last_name</h4>
                    <p class=\"email-summary text-primary\">$email</p>
                    <p class=\"email-summary\"><strong>". substr_replace($description, "<strong>.....</strong>", 60);"</strong><span class=\"label label-success\">New</span> </p>
                </div>
            </div>
        </td>
    </tr>";
}
}

?>