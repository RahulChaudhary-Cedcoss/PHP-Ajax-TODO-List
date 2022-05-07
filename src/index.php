<?php
session_start();
?>
<html>

<head>
    <title>TODO List</title>
    <link href="styleSheet.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./app.js"></script>
    <link href="style.php" rel="stylesheet">
</head>

<body>
    <h2><a href="destroy.php">Session Destroy</a></h2>
    <div class="container">
        <h2>TODO LIST</h2>
        <h3>Add Item</h3>
        <p>
            <input id="task" type="text"><input type="text" hidden id="setid"><button id="add">Add</button><button id="update">Update</button>
        </p>

        <h3>Todo</h3>
        <ul id="incomplete-tasks">
            <li><input type="checkbox"><label>Pay Bills</label><input type="text"><button id="edit" class="edit">Edit</button><button class="delete" id="delete">Delete</button></li>
        </ul>

        <h3>Completed</h3>
        <ul id="completed-tasks">
            <li><input type="checkbox" checked><label>See the Doctor</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
        </ul>
    </div>

    <script>
        function display(data) {
            $("#incomplete-tasks").empty();
            list = "";
            $.each(data, function(key, element) {
                list += `<li>
                             <form action='check.php' method='post'>
                             <input type="checkbox" class="chk" value="${key}"   name='chk_${key}'>
                             </form>
                             <label>${element}</label>
                             <input type="text" hidden id=${key} value="${element}">
                             <button id="edit_${key}" class="edit">Edit</button>
                             <button class="delete" id="delete_${key}" >Delete</button>
                             </li>`;
            });
            $("#incomplete-tasks").append(list);
        }
        function completeTask(data) {
            $("#completed-tasks").empty();
            list = "";
            $.each(data, function(key, element) {
                list += `<li>
                            <form action='uncheck.php' method='post'>
                            <input type="checkbox" class="chked" onclick='form.submit()' value="${key}" name='unchk_${key}'>
                            </form>
                             <label>${element}</label>
                             <input type="text" hidden id=${key} value="${element}">
                             <button class="compdelete" id="delete_${key}" >Delete</button>
                             </li>`;
            });
            $("#completed-tasks").append(list);
        }
    </script>
</body>
</html>