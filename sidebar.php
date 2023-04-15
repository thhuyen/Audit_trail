<div class="side-bar">
    <h2>admin</h2>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item" onclick="switchProduct()">
            <i class="fa-solid fa-list"></i>
            PRODUCTS
        </li>
        <li class="nav-item" onclick="switchLog()">
            <i class="fa-solid fa-file"></i>
            LOGS
        </li>
    </ul>
</div>

<script>
    const url = new URLSearchParams(window.location.search);
    const username = url.get("username");    

    function switchLog() {
        window.location.href = `http://localhost:8080/audit_trail/logs.php?username=${username}`
    }
    function switchProduct() {
        window.location.href = `http://localhost:8080/audit_trail/products.php?username=${username}`
    }
</script>