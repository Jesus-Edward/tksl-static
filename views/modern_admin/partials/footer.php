<!-- =================================================
         FOOTER
    ================================================== -->

        <footer class="admin-footer">

            <div>
               Copyright © <?= date('Y') ?> <a href="<?= url('/admin/dashboard') ?>" target="_blank">Trans Kontinental</a>. All rights reserved.
            </div>


            <div class="footer-links">

                <a href="javascript:;">
                    Privacy
                </a>

                <a href="javascript:;">
                    Terms
                </a>

                <a href="javascript:;">
                    Support
                </a>

            </div>

        </footer>


    </main>



    <!-- =====================================================
     JAVASCRIPT LIBRARIES
===================================================== -->

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script
        src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>


    <script
        src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Your JavaScript -->

    <script src="<?= url('assets/dash/dash.js') ?>"></script>

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