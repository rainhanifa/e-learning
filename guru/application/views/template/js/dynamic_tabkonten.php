<!-- ENABLE TAB -->
<script type="text/javascript">
    $('#myTab a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
</script>

<!-- VALIDASI KOMENTAR DAN CAPTCHA -->
<script type="text/javascript">
    $(document).ready(function() {
        // Generate a simple captcha
        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        };
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
        $('#formkomentar').bootstrapValidator({
            message: 'Mohon periksa data masukan anda',
            fields: {
                komentar: {
                    validators: {
                        notEmpty: {
                            message: 'Field komentar tidak boleh kosong'
                        }
                    }
                },
                subjek: {
                    validators: {
                        notEmpty: {
                            message: 'Field subjek tidak boleh kosong'
                        }
                    }
                },
                captcha: {
                    validators: {
                        callback: {
                            message: 'Periksa kembali jawaban anda',
                            callback: function(value, validator) {
                                var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                                return value == sum;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
