<!-- ============================================================== -->
	                            <!-- footer -->
	                            <!-- ============================================================== -->
	                            <div class="footer">
	                                <div class="container-fluid">
	                                    <div class="row">
	                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
	                                           Copyright © 2021 <?php echo $output["title"]; ?>. All rights reserved.
	                                        </div>
	                                        
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- ============================================================== -->
	                            <!-- end footer -->
	                            <!-- ============================================================== -->
	                        </div>
	                        <!-- ============================================================== -->
	                        <!-- end wrapper  -->
	                        <!-- ============================================================== -->
	                    </div>
	                    <!-- ============================================================== -->
	                    <!-- end main wrapper  -->
	                    <!-- ============================================================== -->
	                    <!-- Optional JavaScript -->
	                    <!-- jquery 3.3.1 -->
	                    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	                    <!-- bootstap bundle js -->
	                    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	                    <!-- slimscroll js -->
	                    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
	                    <!-- main js -->
	                    <script src="../assets/libs/js/main-js.js"></script>
	                    <!-- morris-chart js -->
	                    <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
	                    <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
	                    <script src="../assets/vendor/charts/morris-bundle/morrisjs.html"></script>
	                    <!-- chart js -->
	                    <script src="../assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
	                    <script src="../assets/vendor/charts/charts-bundle/chartjs.js"></script>
	                    <!-- dashboard js -->
	                    <script src="../assets/libs/js/dashboard-influencer.js"></script>

	                    <!-- Optional JavaScript -->
    <script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

    <script type="text/javascript">
    $(function () {
        $("#app").change(function () {
            if ($(this).val() == "MTU") {
                $("#mtu").show();
            } else {
                $("#mtu").hide();
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(function () {
        $("#sales").change(function () {
            if ($(this).val() == "") {
                $("#salesc").show();
            } else {
                $("#salesc").hide();
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(function () {
        $("#cid").change(function () {
            if ($(this).val() == "MYKAD") {
                $("#mykad").show();
                $("#passport").hide();
                $("#brn").hide();
                }
            else if ( this.value == 'PASSPORT')
                {
                    $("#passport").show();
                    $("#mykad").hide();
                    $("#brn").hide();
                }
            else if ( this.value == 'BRN')
                {
                    $("#brn").show();
                    $("#mykad").hide();
                    $("#passport").hide();
                }
            else {
                $("#mykad").hide();
                $("#passport").hide();
                $("#brn").hide();
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(function () {
        $("#location").change(function () {
            if ($(this).val() == "CURRENT ADDRESS") {
                $("#current").show();
                $("#current2").show();
                $("#other").hide();
                $("#other2").hide();
                }
            else if ( this.value == 'OTHER ADDRESS')
                {
                    $("#other").show();
                    $("#other2").show();
                    $("#current").hide();
                    $("#current2").hide();
                }
            else {
                $("#current").hide();
                $("#current2").hide();
                $("#other").hide();
                $("#other2").hide();
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(function () {
        $("#segment").change(function () {
            if ($(this).val() == "CONSUMER") {
                $("#packagec").show();
                $("#packageb").hide();
                }
            else if ( this.value == 'BIZ')
                {
                    $("#packageb").show();
                    $("#packagec").hide();
                }
            else {
                $("#packagec").hide();
                $("#packageb").hide();
            }
        });
    });
    </script>
    <script>
    $(function(e) {
        "use strict";
        $(".mykad-inputmask").inputmask("999999-99-9999"),
            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
    </script>
<?php
mysqli_close($db);
exit(); ?>
</body>
</html>