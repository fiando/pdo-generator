<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PDO MySQL Generator</title>
    <style media="screen">
      html,body {
        margin:0;
        padding:0;
        color: #3e3e3e;
        font-family: sans-serif;
        display: table;
        width: 100%;
        height: 100%;
        background-color: #f1f1f1;
      }
      .table {
        padding: 15px 0;
        width: 80%;
        height: 100%;
        display: table-cell;
        margin: 0 auto;
        vertical-align: middle;
      }
      .container {
        background-color: #fff;
        width: 70%;
        margin: 0 auto;
        text-align: center;
        padding: 15px;
        box-shadow: 1px 0px 3px 1px  #000;
      }
      input, select {
        width: 30%;
        font-size: 110%;
        padding: 5px;
        margin: 10px 0;
      }
      label {
        width: 200px;
        text-align: center;
        display: inline-block;
      }
    </style>
  </head>
  <body>
    <div class="table">
      <div class="container">
        <h1>PDO MYSQL Generator</h1>
        <h2><?php echo (isset($_SESSION['msg'])) ? $_SESSION['msg'] : '' ; ?></h2>
        <form action="generator.php" method="post">
          <fieldset>
            <legend>File Settings</legend>
            <label for="tableName">Table Name</label>
            <input type="text" name="tableName" placeholder="Table Name, ex: User"><br>
            <label for="className">Class Name</label>
            <input type="text" name="className" placeholder="Class Name, ex: Person"><br>
            <label for="keyField">Prmary Key</label>
            <input type="text" name="keyField" placeholder="Primary Key, ex: id_user,id"><br>
          </fieldset>
          <fieldset>
            <legend>Database Settings ( libs/settings.ini.php )</legend>
            <label for="dbHost">Database Host</label>
            <input type="text" name="dbHost" placeholder="Database Host" value = 'localhost'><br>
            <label for="dbUser">Database User</label>
            <input type="text" name="dbUser" placeholder="Database User" value = 'root'><br>
            <label for="dbPass">Database Password</label>
            <input type="text" name="dbPass" placeholder="Database Password" value = ''><br>
            <label for="dbName">Database Name</label>
            <input type="text" name="dbName" placeholder="Database Name" value = ''><br>
          </fieldset>
          <h4>Configuration Finish ? now click "Generate" Button</h4>
          <p>If empty, will be generate default file</p>
          <input type="submit" name="generate" value="Generate">
        </form>
      </div>
    </div>
  </body>
</html>
<?php session_destroy(); ?>
