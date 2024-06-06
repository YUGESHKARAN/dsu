<?php include('./partials/front.php');

if(isset($_SESSION['login']))
{
    echo $_SESSION['login']; // displaying session message
    unset($_SESSION['login']); //removing session message
}
?>



<div class="adcontainer">
    <h1>DHANALAKSHMI SRINIVASAN UNIVERSITY</h1>
    <h3>Students Dasboard</h3>

</div>
</body>
</html>