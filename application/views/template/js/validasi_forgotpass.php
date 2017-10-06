<script type="text/javascript">
    $(document).ready(function() {
        $('#sendmail').formValidation({
            message: 'Mohon periksa kembali data anda',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                forgetmail: {
                    validators: {
                        notEmpty: {
                            message: 'Email tidak boleh kosong'
                        },
                        emailAddress: {
                            message: 'Email tidak valid'
                        }
                    }
                },
                forgetusername: {
                    message: 'Nama pengguna tidak valid',
                    validators: {
                        notEmpty: {
                            message: 'Nama pengguna tidak boleh kosong'
                        },
                        stringLength: {
                            min: 6,
                            max: 20,
                            message: 'Nama pengguna minimal 6 dan maksimal 20 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'Nama pengguna hanya boleh terdiri dari alfabet, nomor, titik dan underscore'
                        }
                    }
                }
            }
        });
    });
</script>