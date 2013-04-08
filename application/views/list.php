<!DOCTYPE html>
<html>
<head>
<title>url shortener</title>
</head>
<body>

    <h1>Create new user OR log in with a existing one:</h1>
    <table>
    <?php
        echo form::open('user/create');
        echo "<tr>";
        echo "<td>".form::label('name', 'Name: ')."</td>";
        echo "<td>".form::input('name', '')."</td>";
        echo "</tr>";
         
        echo "<tr>";
        echo "<td>".form::label('email', 'Email: ')."</td>";    
        echo "<td>".form::input('email', '')."</td>";    
        echo "<tr/>";
         
        echo "<tr>";
        echo "<td>".form::label('password', 'Password: ')."</td>";    
        echo "<td>".form::password('password', '')."</td>";    
        echo "<tr/>";
         
        echo "<tr>";
        echo "<td>".form::submit('submit', 'Create user')."</td>";
        echo "</tr>";
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
            echo "<td>".html::anchor('user/show/'.$user->id, "log in")."</td>";        
            echo "</tr>";
        }
    ?>
</table>
</table>
</body>
</html>