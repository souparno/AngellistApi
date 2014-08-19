<head>
    <script type="text/javascript" src="./assets/js/libs/jquery-1.9.0/jquery.min.js"></script>
</head>
<body>

    <form method="POST">
        <select id="slct" name="slct">
            <option>SELECT TAG</option>
            <?php
            foreach ($response["jobs"] as $value) {

                foreach ($value["tags"] as $v) {
                    ?>
                    <option value="<?php echo $v["id"] ?>"><?php echo $v["name"] ?></option>
                    <?php
                }
            }
            ?>
        </select>    
        <button type="submit">Ok</button>
    </form>

    <?php if (isset($result)) { ?>
        <table>
            <tr>
                <td>ID</td>
                <td>TITLE</td>
                <td>NAME</td>
                <td>SALARY min</td>
                <td>SALARY max</td>
            </tr>
            <?php foreach ($response["jobs"] as $value) { ?>
                <tr>
                    <td><?php echo $value["id"] ?></td>
                    <td><?php echo $value["title"] ?></td>
                    <td><?php echo $value["startup"]["name"] ?></td>
                    <td><?php echo $value["salary_min"] ?></td>
                    <td><?php echo $value["salary_max"] ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</body>