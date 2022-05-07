$(document).ready(function () {
  $("#update").hide();

  $("#add").click(function () {
    var task = $("#task").val();
    $.ajax({
      type: "GET",
      url: "main.php",
      data: { val: task, action: "add" },
      datatype: "JSON",
      success: function (respons) {
        data = JSON.parse(respons);
        display(data);
      },
    });
  });

  $(document).on("click", ".delete", function () {
    var x = this.id;
    var id = x.split("_")[1];
    $.ajax({
      type: "GET",
      url: "main.php",
      data: { id: id, action: "delete" },
      datatype: "JSON",
      success: function (respons) {
        data = JSON.parse(respons);
        display(data);
      },
    });
  });

  $(document).on("click", ".edit", function () {
    var x = this.id;
    var id = x.split("_")[1];
    var val = $(`#${id}`).val();
    $("#task").val(val);
    $("#setid").val(id);
    console.log(val);
    $("#add").hide();
    $("#update").show();
  });
  $("#update").click(function () {
    var task = $("#task").val();
    var id = $("#setid").val();
    $.ajax({
      type: "GET",
      url: "main.php",
      data: { val: task, id: id, action: "update" },
      datatype: "JSON",
      success: function (respons) {
        data = JSON.parse(respons);
        display(data);
      },
    });
    $("#add").show();
    $("#update").hide();
  });

  $(document).on("click", ".chk", function () {
    var val = this.value;
    $.ajax({
      type: "GET",
      url: "complogic.php",
      data: { id: val, action: "todo_check" },
      datatype: "JSON",
      success: function (respons) {
        data = JSON.parse(respons);
        tododata = JSON.parse(data.todo);
        completetodo = JSON.parse(data.complete_todo);
        console.log(data);
        display(tododata);
        completeTask(completetodo);
      },
    });
  });

  $(document).on("click", ".chked", function () {
    var val = this.value;
    $.ajax({
      type: "GET",
      url: "complogic.php",
      data: { id: val, action: "comp_check" },
      datatype: "JSON",
      success: function (respons) {
        data = JSON.parse(respons);
        tododata = JSON.parse(data.todo);
        completetodo = JSON.parse(data.complete_todo);
        display(tododata);
        completeTask(completetodo);
      },
    });
  });

  $(document).on("click", ".compdelete", function () {
    var x = this.id;
    var id = x.split("_")[1];
    $.ajax({
      type: "GET",
      url: "complogic.php",
      data: { id: id, action: "deletecomp" },
      datatype: "JSON",
      success: function (respons) {
        data = JSON.parse(respons);

        completetodo = JSON.parse(data.complete_todo);

        completeTask(completetodo);
      },
    });
  });
});
