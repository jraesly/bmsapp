<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/left-nav.style.css">
<link rel="stylesheet" type="text/css" href="../assets/lib/prism/prism.css">

';
$xfooter = '<script src="../assets/js/filter.sysfrm.js" type="text/javascript"></script>
<script src="../assets/js/filter.sysfrm.js" type="text/javascript"></script>
<script src="../assets/lib/prism/prism.js" type="text/javascript"></script>
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">

        <div id="left-nav" class="hidden-phone">
			<?php require ('sections/dev-tools.section.tpl.php'); ?>
		</div>
 
        <div class="right-container">
        <div class="span8">
        <h4>Authentication</h4>
        <p>For strong security, When an admin or client login, the system generate a login token and store it on cookie. Along with session, it verify the login token before authenticate. It prevents the session hijacking.</p>
        <p></p>
         <p>Here is the code snippet -</p>
          <p></p>
        </div>
       <pre style="width:100%"><code class="language-css">$stmt = $dbh->prepare("SELECT id, username, password FROM admins WHERE username = :user_id AND password = :password AND status='Active'");
    $stmt->bindParam(':user_id', $username, PDO::PARAM_STR, 12);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR, 30);
    $stmt->execute();
    $result = $stmt->fetchAll();
	if ($stmt->rowCount()=="1") {
        foreach ($result as $value) {
            $_SESSION['aid']=$value['id'];
            /*
            Create a Unique Login Token
            */
            $lid = md5(uniqid(rand(),TRUE));
            $_SESSION['lid'] = $lid;
            setcookie("_lid", "$lid", time()+86400);
            r2('home'.EXT);

        }</code></pre>
<div class="span8">
        
        <p></p>
         <p>To verify the login token -</p>
          <p></p>
        </div>
       <pre style="width:100%"><code class="language-css">_authenticate();
$slid = $_SESSION['lid'];
$ulid = $_COOKIE["_lid"];
if ($slid != $ulid) {
    r2('../login'.EXT,'e','Invalid Token Please Login Again');
}</code></pre>
        </div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>