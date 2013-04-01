<!DOCTYPE html>
<html>
<head>
<title>url shortener</title>
</head>
<body>
    <?php echo form::open('user/create_session'); ?>
    <table>
    <tr>
        <td colspan='2' class='editor_title'>Log in</td>
    </tr>
    <?php
        echo "<tr>";
        echo "<td>".form::label('email', 'Email: ')."</td>";    
        echo "<td>".form::input('email', '')."</td>";    
        echo "<tr/>";
         
        echo "<tr>";
        echo "<td>".form::label('password', 'Password: ')."</td>";    
        echo "<td>".form::input('password', '')."</td>";    
        echo "<tr/>";
         
        echo "<tr>";
        echo "<td>".form::submit('submit', 'login')."</td>";
        echo "</tr>";
    ?>
    </table>
    <?php echo form::close(); ?>
</body>
</html>