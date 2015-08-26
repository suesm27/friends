<html>
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <style></style>
 <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand"></span>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/users/logoff"><span class="glyphicon glyphicon-log-in"> Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
  </nav>
  <div class="main-container">
    <div class="container">
      <h1>Hello <?php echo $this->session->userdata('name'); ?></h1>
      <h3>Here is the list of your friends:</h3>
        <table class='table table-striped'>
          <thead>
            <th>Alias</th>
            <th>Action</th>
          </thead>
          <tbody>
      <?php 
        foreach($friends as $p){
          echo "<tr>";
          echo "<td>{$p['alias']}</td>";
          echo "<td>";
          echo "<a href='/users/view_profile/{$p['id']}'>View Profile</a> | ";
          echo "<a href='/main/delete_friend/{$this->session->userdata('current_user_id')}/{$p['id']}'>Remove as Friend</a>";
          echo "</td>";
          echo "</tr>";
        }
      ?>
      </tbody>
    </table>
    <h3>Other Users not ion your friend's list:</h3>
        <table class='table table-striped'>
          <thead>
            <th>Alias</th>
            <th>Action</th>
          </thead>
          <tbody>
      <?php 
        foreach($other_users as $p){
          echo "<tr>";
          echo "<td><a href='/users/view_profile/{$p['id']}'>{$p['alias']}</a></td>";
          echo "<td>";
          echo "<a href='/main/add_friend/{$this->session->userdata('current_user_id')}/{$p['id']}'>Add as Friend</a>";
          echo "</td>";
          echo "</tr>";
        }
      ?>
      </tbody>
    </table>
    </div>
  </div>
</body>
</html>