<script>
    $('.grid-row-delete').unbind('click').click(function() {

        var id = $(this).data('id');

        swal({
                title: "确认删除?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确认",
                closeOnConfirm: false,
                cancelButtonText: "取消"
            },
            function(){
                $.ajax({
                    method: 'delete',
                    url: '{{ $url }}' + '/' + id,
                    data: {
                        _token:LA.token
                    },
                    success: function (data) {
                        $.pjax.reload('#pjax-container');

                        if (typeof data === 'object') {
                            if (data.status) {
                                swal(data.message, '', 'success');
                            } else {
                                swal(data.message, '', 'error');
                            }
                        }
                    }
                });
            });
    });
</script>