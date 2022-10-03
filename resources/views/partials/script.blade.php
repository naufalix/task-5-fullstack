<script>var hostUrl = "assets/";</script>
    <!--begin::Javascript-->
    
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="/assets/plugins/custom/datatables.net-bs4/jquery.dataTables.js"></script>
    <script src="/assets/plugins/custom/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="/assets/plugins/custom/select2/select2.min.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="/assets/js/custom/widgets.js"></script>
    <script src="/assets/js/custom/documentation/documentation.js"></script>
    <script src="/assets/js/custom/documentation/search.js"></script>
    <script src="/assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Page Custom Javascript-->
    <script>
      $(document).ready(function () {
        $('#myTable').DataTable({
          "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
          "pageLength": 25,
          "language": {
            "paginate": {
              "previous": "<",
              "next": ">"
            }
          }
        });
      });
    </script>
    <!--end::Javascript-->