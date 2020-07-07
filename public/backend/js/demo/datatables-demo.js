// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable({
    lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    columnDefs: [{
      targets: [0],
      orderData: [0, 1]
    }, {
      targets: [1],
      orderData: [1, 0]
    }, {
      targets: [3],
      orderData: [3, 0]
    }]
  });
});
