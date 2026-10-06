                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y') ?> <a href="<?= url('/admin/dashboard') ?>" target="_blank">Trans Kontinental</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
                </div>
                <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
                </div>
                <!-- container-scroller -->

                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.8/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.datatables.net/3.1.1/js/dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/3.1.1/js/dataTables.bootstrap5.min.js"></script>
                <!-- plugins:js -->
                <script src="<?= url('assets/admin/vendors/js/vendor.bundle.base.js') ?>"></script>
                <!-- endinject -->
                <!-- Plugin js for this page -->
                <script src="<?= url('/assets/admin/vendors/chart.js/chart.umd.js') ?>"></script>
                <script src="<?= url('assets/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
                <!-- End plugin js for this page -->
                <!-- inject:js -->
                <script src="<?= url('assets/admin/js/off-canvas.js') ?>"></script>
                <script src="<?= url('assets/admin/js/misc.js') ?>"></script>
                <script src="<?= url('assets/admin/js/settings.js') ?>"></script>
                <script src="<?= url('assets/admin/js/todolist.js') ?>"></script>
                <script src="<?= url('assets/admin/js/jquery.cookie.js') ?>"></script>
                <!-- endinject -->
                <!-- Custom js for this page -->
                <script src="<?= url('assets/admin/js/dashboard.js') ?>"></script>
                <!-- End custom js for this page -->
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


                <script>
                    new DataTable('#product-table');
                    new DataTable('#order-table');

                    const url = 

                    document.addEventListener('click', e => {
                        const btn = e.target.closest('.status-btn');
                        if (!btn) return;

                        const orderId = btn.dataset.id;
                        const newStatus = btn.dataset.status;

                        // Custom color and text based on status
                        const config = {
                            completed: {
                                color: '#28a745',
                                text: 'Mark this order as Completed?'
                            },
                            contacted: {
                                color: '#007bff',
                                text: 'Mark this order as Contacted?'
                            },
                            cancelled: {
                                color: '#dc3545',
                                text: 'Are you sure you want to CANCEL?'
                            }
                        };

                        Swal.fire({
                            title: 'Confirm Action',
                            text: config[newStatus].text,
                            icon: newStatus === 'cancelled' ? 'warning' : 'question',
                            showCancelButton: true,
                            confirmButtonColor: config[newStatus].color,
                            confirmButtonText: `Yes, ${newStatus}`
                        }).then(result => {
                            if (!result.isConfirmed) return;

                            Swal.fire({
                                title: 'Updating...',
                                didOpen: () => Swal.showLoading()
                            });

                            fetch("<?= url('/update-status') ?>", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded'
                                    },
                                    // body: `order_id=${orderId}&status=${newStatus}`
                                    body: new URLSearchParams({
                                        order_id: orderId,
                                        status: newStatus
                                    })
                                })
                                .then(r => r.json())
                                .then(data => {
                                    console.log(data);
                                    
                                    if (data.success) {
                                        Swal.fire('Done!', `Status is now ${newStatus}`, 'success');
                                        document.getElementById(`status-${orderId}`).textContent = newStatus;
                                    } else {
                                        Swal.fire('Error', data.message, 'error');
                                    }
                                });
                        });
                    });
                </script>
                </body>

                </html>