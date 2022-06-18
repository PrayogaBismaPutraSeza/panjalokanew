</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. WRAPPER  -->

<div id="footer">
    Copyright © 2022 By <a href="https://www.polinema.ac.id/" target="_blank">Student of State Polythecnic of Malang</a>
</div>

</section>

<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>
</body>

</html>