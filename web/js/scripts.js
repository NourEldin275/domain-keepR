// $(document).ready(function () {
//
//     // attach keyup event
//
//     var timer;
//     var typingInterval = 4500;
//
//     $("#header-search").change(function (event) {
//
//         var search = $(this).val();
//
//         if ( search.length < 3 ){
//             return false;
//         }
//
//         clearTimeout(timer);
//         timer = setTimeout(searchApp(search), typingInterval);
//
//     });
//
// });
//
// function searchApp(search){
//
//     var url = 'http://localhost:8000/ajax/search';
//     $.get(
//         url,
//         {
//             'term': search
//         },
//         function (data) {
//             var result = '<div id="search-results">';
//
//             var domains = data.data.domains;
//             var clients = data.data.clients;
//
//             for ( var i = 0; i < domains.length; i++ ){
//                 result += domains[i].domain + '<br>';
//             }
//
//             for ( var i = 0; i < clients.length; i++ ){
//                 result += clients[i].name + '<br>';
//             }
//
//             result += '</div>';
//
//             $("#header-search").after(result);
//
//         }
//     );
//
// }