<!-- navbar -->
<script>
    function showDropBtn() {
    var element = document.getElementByID("dropdown-content");

    if (element.style.visibility === "hidden" ) {
        element.style.visibility = "visible";
    } else {
        element.style.visibility = "hidden";
        }
    }          
</script>  

<ul>
    <li><a href="../HTML/index.html"> Home </a></li>
    <li><a href="../HTML/contact.html"> Contact Us </a></li>
    <div class="dropdown">
        <dropbtn class="dropbtn" onclick="showDropBtn()"> Blogs </dropbtn>
        <div class="dropdown-content">
            <li><a href="blog-index.php"> View Blogs </a></li>
        </div>
    </div>
    <li style = "float:right"><a href="../HTML/login.html"> Login </a></li>
</ul>
