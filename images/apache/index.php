<html>
<body>
    <h1>Environment</h1>
    <?php
        $user = getenv('user');
        $pass = getenv('pass');
        $host = getenv('host');
    ?>
    <table>
        <tr><th>user: </th><td><?php echo "$user"; ?></td></tr> 
        <tr><th>pass: </th><td><?php echo "$pass"; ?></td></tr> 
        <tr><th>host: </th><td><?php echo "$host"; ?></td></tr> 
    </table>
</body>
</html>

