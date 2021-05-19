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

<!-- navbar -->
<ul>
    <li><a href="../elevated/index.php"> Home </a></li>
    <li><a href="../elevated/contact.php"> Contact Us </a></li>
    <div class="dropdown">
        <dropbtn class="dropbtn" onclick="showDropBtn()"> Blogs </dropbtn>
        <div class="dropdown-content">
            <li><a href="../elevated/blog-index.php"> View Blogs </a></li>
            <li><a href="../elevated/blog-edit.php"> Edit a Blog </a></li>
            <li><a href="../elevated/blog-create.php"> New Blog </a></li>
        </div>
    </div>
    <li style = "float:right"><a href="../elevated/myaccount.php"> My Account </a></li>
</ul>
