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
        width: 50%;
        text-align: center;
        font-size: 110%;
        padding: 5px;
      }
    </style>
  </head>
  <body>
    <div class="table">
      <div class="container">
        <h1>PDO MYSQL Generator</h1>
        <form action="generator.php" method="post">
          <h3>Select From Database Table Name</h3>
          <select class="" name="tableNameDb">
            <option value="">Select Database Table</option>
            <option value="option">option</option>
            <option value="option">option</option>
          </select>
          <h3>OR Name Set Name Table</h3>
          <input type="text" name="tableName" placeholder="Blank it yo use Database Table Name">
          <h3>Type Class Name</h3>
          <input type="text" name="className" value="">
          <h3>Type Name of key Field</h3>
          <input type="text" name="keyField" value="">
          <h3>Configuration Finish, now click "Generate" Button</h3>
          <input type="submit" name="generate" value="Generate">
        </form>
      </div>
    </div>
  </body>
</html>
