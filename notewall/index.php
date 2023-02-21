<!DOCTYPE html>
<html>
  <head>
  </head>	
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
        $title = $_POST['title'];
        $description = $_POST['description'];
        $file = fopen('kanta.txt', 'a'); // 'a' stands for append mode
        fwrite($file, $title . "\n"); // write the title and a newline character to the file
        fwrite($file, $description . "\n"); // write the description and a newline character to the file
        fclose($file); // close the file
      }
    ?>
  </body>
</html>