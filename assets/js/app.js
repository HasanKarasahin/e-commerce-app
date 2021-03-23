$(document).ready(function () {
    /*
        $.post({
            url: "/Data/Todo/Data_Todo_AllData.php",
            data: {name:"Hasan",surname:"Karasahin"},
            success: function(data) {
                console.table(data);
                $("tbody").append(data);
            },
            error:function(e){
                alert("error");
            }
          });*/

    var exampleAddModal = document.getElementById('exampleAddModal')
    //var modalBodyButton = exampleAddModal.querySelector('.modal-footer .btn.btn-primary')
    //var modalForm = exampleAddModal.querySelector('.modal-body #exampleFormModal')
    /*
            $(modalBodyButton).click(function () {
                $.post({
                    url: "Actions/ToDo/Action_Todo_Add.php",
                    data: $(modalForm).serialize(),
                    success: function(data) {
                        console.table(data);
                        $("tbody").append(data);
                    },
                    error:function(e){
                        alert("error");
                        console.log(e);
                    }
                  });
            })*/


    var exampleUpdateModal = document.getElementById('exampleUpdateModal')
    var modalBodyUpdateButton = exampleUpdateModal.querySelector('.modal-footer .btn.btn-primary')
    var modalUpdateForm = exampleUpdateModal.querySelector('.modal-body #exampleFormModal')

    $(modalBodyUpdateButton).click(function () {
        $.post({
            url: "Actions/ToDo/Action_Todo_Update.php",
            data: $(modalUpdateForm).serialize(),
            success: function (data) {
                console.table(data);
                $("tbody").append(data);
            },
            error: function (e) {
                alert("error");
                console.log(e);
            }
        });
    })


    exampleAddModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        //var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.

    });


});