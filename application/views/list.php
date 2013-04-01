<!DOCTYPE html>
<html>
<head>
<title>url shortener</title>
</head>
<body>
<?php 
    echo html::anchor('user/show_create_editor', 'Create new user'); 
?>
    <table>   
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td></td>
    </tr>    
<?php
    foreach($users_list as $user)
    {
        echo "<tr>";
        echo "<td>".$user->name."</td>";
        echo "<td>".$user->email."</td>";
        echo "<td>".html::anchor('user/show/'.$user->id, "profile")."</td>";        
        echo "</tr>";
    }
?>
</table>
</body>
</html>