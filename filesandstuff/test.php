<!DOCTYPE html>
<html>
<head>
  <title>test</title>
</head>
<body>

  <form id="formtest" method="post">
    <select name="sel">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </form>
  <button name="submit" form="formtest">Submit</button>

<?php if (isset($_POST['sel'])) {
  echo $_POST['sel'];
}
?>
</body>
</html>