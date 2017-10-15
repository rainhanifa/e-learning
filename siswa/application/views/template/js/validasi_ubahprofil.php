
        <!-- Form Update Profil -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#formedprofil').formValidation({
                    message: 'Mohon periksa kembali data anda',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
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
                        kelas: {
                            message: 'Kelas tidak valid',
                            validators: {
                                notEmpty: {
                                    message: 'Field kelas tidak boleh kosong'
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
                                    max: 16,
                                    message: 'NIM maksimal 15 karakter'
                                },
                                regexp: {
                                    regexp: /^[0-9]+$/,
                                    message: 'No absen hanya terdiri dari angka'
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
                            validators: {
                                file: {
                                    extension: 'jpeg,jpg,gif,png,bmp',
                                    type: 'image/jpeg,image/gif,image/png,image/x-ms-bmp',
                                    maxSize: 2097152,
                                    message: 'File harus bertipe JPEG/JPG/GIF/PNG/BMP dan kurang dari 2 MB'
                                }
                            }
                        },
                        ulangikunci: {
                            validators: {
                                identical: {
                                    field: 'kunci',
                                    message: 'Tidak sama dengan password'
                                }
                            }
                        }
                    }
                });
            });
        </script>