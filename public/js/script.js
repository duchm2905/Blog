var Test = function () {
    function userTable() {
        let $url = $('.table').data('url');
        $('.table').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: $url,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name:'role'},
            ]
        });
    }
    function postTable() {
        let $url = $('.listPost').data('url');
        $('.listPost').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: $url,
            columns: [
                {data: 'DT_Row_Index', name: 'DT_Row_Index'},
                {data: 'title', name: 'title'},
                {data: 'name', name: 'name', orderable : false},
                {data: 'delete', name: 'Action' , orderable : false}
            ]
        });
    }
    return {
        user: userTable,
        list: postTable
    }
}();

$(document).ready(function() {
    Test.user();
    Test.list();
});