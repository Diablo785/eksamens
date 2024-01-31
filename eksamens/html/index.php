<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pievienot Zinojumu</title>
  <link rel="stylesheet" href="../css/index.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div class="form-container">
  <div class="sort-container">
    <label for="sort-dropdown">Kārtot pēc:</label>
    <select id="sort-dropdown">
      <option value="latest">Jaunākie</option>
      <option value="oldest">Vecākie</option>
    </select>

    <input type="text" id="search-bar" placeholder="Meklēt...">
  </div>

  <h2>Pievienot:</h2>
  <form action="#" method="post" class="form" id="zinojumsForm">
    <label class="form-label">
      Vards:
      <input type="text" name="vards" class="form-input">
    </label>
    <br>
    <label class="form-label">
      Epasts:
      <input type="email" name="epasts" class="form-input">
    </label>
    <br>
    <label class="form-label">
      Zinojums:
      <textarea name="zinojums" class="form-textarea"></textarea>
    </label>
    <br>
    <button type="button" class="form-button" id="submitZinojums">Pievienot Zinojumu</button>
  </form>

  <h2>Zinojumi:</h2>
  <div class="zinojums-container" id="zinojumsContainer">
    <?php
    include '../php/db.php';

    $db = new DB();
    $conn = $db->conn;

    // Fetch zinojums with user information from the database
    $result = $conn->query("SELECT z.*, u.vards, u.epasts FROM `zinojums` z
                             JOIN `users` u ON z.user_id = u.id");

    if ($result->num_rows > 0) {
      echo "<ul class='zinojums-list'>";
      while ($row = $result->fetch_assoc()) {
        echo "<li class='zinojums-item'>";
        echo "<p class='zinojums-author'>Pievienoja: {$row['vards']} ({$row['epasts']}) {$row['datums']}</p>";
        echo "<p>{$row['zinojums']}</p>";
        echo "</li>";
      }
      echo "</ul>";
    } else {
      echo "<p>Nav Pieejams Neviens Zinojums.</p>";
    }
    ?>
  </div>
</div>

<script>
  $(document).ready(function () {
    loadZinojums();

    $('#sort-dropdown, #search-bar').on('input', function () {
      loadZinojums();
    });

    $('#submitZinojums').click(function () {
      var vards = $('input[name="vards"]').val();
      var epasts = $('input[name="epasts"]').val();
      var zinojums = $('textarea[name="zinojums"]').val();

      if (vards.trim() === '' || epasts.trim() === '' || zinojums.trim() === '') {
        alert('Please fill in all fields.');
        return;
      }

      if (!isValidEmail(epasts)) {
        alert('Please enter a valid email address.');
        return;
      }

      $.ajax({
        url: '../php/pievienosana.php',
        type: 'POST',
        data: { vards: vards, epasts: epasts, zinojums: zinojums },
        success: function () {
          loadZinojums();
        },
        error: function () {
          console.error('Error adding zinojums.');
        }
      });
    });

    function loadZinojums() {
      var sortOption = $('#sort-dropdown').val();
      var searchQuery = $('#search-bar').val();

      $.ajax({
        url: '../php/sort.php',
        url: '../php/search.php',
        type: 'POST',
        data: { sortOption: sortOption, searchQuery: searchQuery },
        success: function (data) {
          $('#zinojumsContainer').html(data);
        },
        error: function () {
          console.error('Error loading zinojums.');
        }
      });
    }

    function isValidEmail(email) {
      // Use a regular expression to validate the email format
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });
</script>

</body>
</html>
