<!DOCTYPE html>
<html>
  <head>
  </head>	
   <style>
      body {
        text-align: center;
        font-family: sans-serif;
        background-color: #f7f7f7;
		width: 20%;
		margin: 0 auto;
      }
      h1 {
        margin-top: 50px;
        font-size: 40px;
        color: #333;
      }
      form {
        margin-top: 30px;
      }
      input[type="text"], textarea {
        width: 80%;
        padding: 10px;
        margin: 10px auto;
        display: block;
        border-radius: 5px;
        border: none;
      }
      button[type="submit"] {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
      }
      button[type="submit"]:hover {
        background-color: #555;
      }
      .note {
        background-color: #fff;
        margin: 20px auto;
        width: 80%;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        text-align: left;
      }
    </style>

  <body>
    <h1>notewall</h1>
    <form method="post">
      <input type="text" id="title" name="title" placeholder="Enter Title">
      <textarea id="description" name="description" placeholder="Enter Description"></textarea>
      <button type="submit" name="submit">Save Note</button>
    </form>
    <div id="notes">
      <?php
        $notes = file('kanta.txt'); // read the contents of the file into an array
        foreach($notes as $note) {
          echo "<div class='note'>$note</div>"; // display each note in a separate <div> element
        }
      ?>
    </div>
    <?php
      if(isset($_POST['submit'])) {
        $title = htmlspecialchars ($_POST['title']);
        $description = htmlspecialchars( $_POST['description']);
        $file = fopen('kanta.txt', 'a'); // 'a' stands for append mode
        fwrite($file, $title . "\n"); // write the title and a newline character to the file
        fwrite($file, $description . "\n"); // write the description and a newline character to the file
        fclose($file); // close the file
      }
    ?>
  </body>
</html>