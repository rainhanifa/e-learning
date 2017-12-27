<!-- Form Registrasi -->
<script type="text/javascript">
    $(document).ready(function() {
        // Generate a simple captcha
        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        };
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
        
        $('#registrasi').formValidation({
            message: 'Mohon periksa kembali data anda',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                pengguna: {
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
                },
                nama: {
                    message: 'Nama lengkap tidak valid',
                    validators: {
                        notEmpty: {
                            message: 'Nama lengkap tidak boleh kosong'
                        },
                        stringLength: {
                            min: 1,
                            max: 35,
                            message: 'Nama lengkap maksimal 35 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z/ /]+$/,
                            message: 'Nama lengkap hanya boleh terdiri dari alfabet dan spasi'
                        }
                    }
                },
                gurukelas: {
                    message: 'Dosen offering tidak valid',
                    validators: {
                        notEmpty: {
                            message: 'Pilih dosen offering'
                        }
                    }
                },
                nip: {
                    message: 'NIP tidak valid',
                    validators: {
                        notEmpty: {
                            message: 'NIP tidak boleh kosong'
                        },
                        stringLength: {
                            min: 1,
                            max: 22,
                            message: 'Mohon isi NIP sesuai data'
                        },
                        regexp: {
                            regexp: /^[0-9/ /]+$/,
                            message: 'NIP hanya terdiri dari angka dan spasi'
                        }
                    }
                },
                absen: {
                    message: 'NIM tidak valid',
                    validators: {
                        notEmpty: {
                            message: 'NIM tidak boleh kosong'
                        },
                        stringLength: {
                            min: 1,
                            max: 15,
                            message: 'NIM maksimal 15 karakter'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'NIM hanya terdiri dari angka'
                        }
                    }
                },
                mail: {
                    validators: {
                        notEmpty: {
                            message: 'Email tidak boleh kosong'
                        },
                        emailAddress: {
                            message: 'Email tidak valid'
                        }
                    }
                },
                profil: {
                    message: 'Foto profil tidak valid',
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,gif,png,bmp',
                            type: 'image/jpeg,image/gif,image/png,image/x-ms-bmp',
                            maxSize: 2097152,
                            message: 'File harus bertipe JPEG/JPG/GIF/PNG/BMP dan kurang dari 2 MB'
                        }
                    }
                },
                profilsiswa: {
                    message: 'Foto profil tidak valid',
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,gif,png,bmp',
                            type: 'image/jpeg,image/gif,image/png,image/x-ms-bmp',
                            maxSize: 2097152,
                            message: 'File harus bertipe JPEG/JPG/GIF/PNG/BMP dan kurang dari 2 MB'
                        }
                    }
                },
                kunci: {
                    validators: {
                        notEmpty: {
                            message: 'Kata kunci tidak boleh kosong'
                        }
                    }
                },
                ulangikunci: {
                    validators: {
                        notEmpty: {
                            message: 'Konfirmasi kata kunci tidak boleh kosong'
                        },
                        identical: {
                            field: 'kunci',
                            message: 'Kata kunci tidak sama'
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