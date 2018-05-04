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
        let $url = $('.categoryPost').data('url');
        $('.categoryPost').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: $url,
            columns: [
                {data: 'DT_Row_Index', name: 'DT_Row_Index'},
                {data: 'name', name: 'name', orderable : false},
                {data: 'delete', name: 'Action' , orderable : false}
            ]
        });
    }
    function categoryTable(){
        let $url = $('.listPost').data('url');
    }
    return {
        user: userTable,
        post: postTable,
        category: postTable
    }
}();

$(document).ready(function() {
    Test.user();
    Test.post();
    Test.category();
});