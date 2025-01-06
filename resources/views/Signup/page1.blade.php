@extends('layouts.registration_layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 mt-4">
                <h3 class="font-weight-bold">Start Registration</h3>
                <div class="card mt-4 mb-5 shadow">
                    <div class="card-body p-4">
                        <form autocomplete="off" method="post" id="registerForm">
                            {{ method_field('POST') }}
                            @csrf

                            <div class="form-row row mb-0">
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="first_name" class="form-label">First Name <i
                                            class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-rounded" name="first_name"
                                        id="first_name" placeholder="Enter First Name" required />
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="last_name" class="form-label">Last Name <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-rounded" name="last_name"
                                        id="last_name" placeholder="Enter Last Name" required />
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                            </div>

                            <div class="form-row row mb-0">
                                <div class="form-group col-md-12 input-group-sm">
                                    <label for="id_number" class="form-label">ID Number / Passport <i
                                            class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-rounded" name="id_number"
                                        id="id_number" placeholder="Enter ID Number / Passport" required />
                                    <div class="invalid-feedback" id="idError">This field is required.</div>
                                </div>
                            </div>

                            <div class="form-row row mb-0">
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="country_code" class="form-label">Country Code <i
                                            class="text-danger">*</i></label>
                                    <select class="select2-container" name="country_code" id="country_code" required>
                                        <option value="" disabled selected>--Select Country--</option>
                                        {{-- @foreach ($countries as $country)
                                            <option value="{{ $country->phone_code }}">
                                                {{ $country->phone_code }}&nbsp;&nbsp;{{ $country->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="phone_no" class="form-label">Phone No <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-rounded" name="phone_no"
                                        id="phone_no" placeholder="Enter Phone Number" required />
                                    <div class="invalid-feedback" id="phoneError">This field is required.</div>
                                </div>
                            </div>


                            <div class="form-row row mb-0">
                                <div class="form-group col-md-12 input-group-sm">
                                    <label for="email" class="form-label">Email <i class="text-danger">*</i></label>
                                    <input type="email" class="form-control form-control-rounded" name="email"
                                        id="email" placeholder="Enter Email" required />
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                            </div>

                            <div class="form-row row mb-0">
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="password" class="form-label">Password <i class="text-danger">*</i></label>
                                    <input type="password" class="form-control form-control-rounded" name="password"
                                        id="password" placeholder="Enter Password" required />
                                    <div class="invalid-feedback" id="passwordError">This field is required.</div>
                                </div>
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="confirm_password" class="form-label">Confirm Password <i
                                            class="text-danger">*</i></label>
                                    <input type="password" class="form-control form-control-rounded" name="confirm_password"
                                        id="confirm_password" placeholder="Confirm Password" required />
                                    <div class="invalid-feedback" id="confirmError">This field is required.</div>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input " type="checkbox"
                                            id="showPassword" />
                                        <label class="form-check-label" for="showPassword">Show Password</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-next btn-lg px-5" id="submit" title="submit"
                                        type="submit"
                                        data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('modal')
    <!-- OTP Validation Modal -->
    <div class="modal" id="Otp" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <h5 class="modal-title">Verify OTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <p class="lead mb-4">
                                <small>
                                    An OTP has been sent to both your email and mobile phone.
                                </small>
                            </p>
                            <input type="text" class="form-control mb-4" name="otp_password" id="otp_password"
                                placeholder="Enter OTP" />
                            <small class="invalid-feedback">This Field is Required.</small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button id="resendOTP" class="btn btn-back btn-sm" data-normal-text="Resend"
                                data-loading-text="Resending...">Resend</button>
                            <button id="validateOTP" class="btn btn-next btn-sm" data-normal-text="Verify"
                                data-loading-text="Verifying...">Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    // Helper function to toggle submit button
    function toggleSubmitButton(isValid) {
        const button = document.getElementById("submit");
        button.disabled = !isValid;
        button.style.opacity = isValid ? "1" : "0.5";
    }

    // Validate all form fields
    function validateForm() {
        let isValid = true;


        // Password validation
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;
        const passwordError = document.getElementById("passwordError");
        const confirmError = document.getElementById("confirmError");
        const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d).{8,}$/;

        if (!passwordPattern.test(password)) {
            passwordError.textContent =
                "Password must contain at least one letter, one digit, and be at least 8 characters long.";
            passwordError.style.display = "block";
            isValid = false;
        } else {
            passwordError.style.display = "none";
        }

        if (password !== confirmPassword) {
            confirmError.textContent = "Passwords do not match.";
            confirmError.style.display = "block";
            isValid = false;
        } else {
            confirmError.style.display = "none";
        }

        const countryCode = document.getElementById("country_code").value;

        if (countryCode === "254") {
            // Phone number validation
            const phoneNumber = document.getElementById("phone_no").value;
            const phoneError = document.getElementById("phoneError");
            const phoneRegex = /^\d{9}$/;

            if (phoneNumber.trim() !== "") {
                if (phoneNumber.startsWith("0")) {
                    phoneError.textContent = "Phone number should not start with 0.";
                    phoneError.style.display = "block";
                    isValid = false;
                } else if (phoneNumber.length >= 9 && !phoneRegex.test(phoneNumber)) {
                    // Only show invalid message when they've entered 9 digits
                    phoneError.textContent =
                        "Please enter a valid 9-digit phone number starting with 7 or 1 e.g. 712345678";
                    phoneError.style.display = "block";
                    isValid = false;
                } else if (phoneNumber.length !== 9) {
                    // Hide any error while they're still typing
                    phoneError.style.display = "none";
                    isValid = false;
                } else {
                    phoneError.style.display = "none";
                }
            } else {
                phoneError.style.display = "none";
                isValid = false;
            }

        }


        // ID number validation
        const idNumber = document.getElementById("id_number").value;
        const idError = document.getElementById("idError");

        if (idNumber.length < 7) {
            idError.textContent = "ID number must be at least 7 digits long.";
            idError.style.display = "block";
            isValid = false;
        } else {
            idError.style.display = "none";
        }

        // Update submit button state
        toggleSubmitButton(isValid);
        return isValid;
    }

    // // Add input event listeners
    document.getElementById("password").addEventListener("input", validateForm);
    document.getElementById("confirm_password").addEventListener("input", validateForm);
    document.getElementById("phone_no").addEventListener("input", validateForm);
    document.getElementById("id_number").addEventListener("input", validateForm);
    document.getElementById("phone_no").addEventListener("input", validateForm);

    // Toggle password visibility
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        const confirmInput = document.getElementById("confirm_password");
        const checkBox = document.getElementById("showPassword");

        const inputType = checkBox.checked ? "text" : "password";
        passwordInput.type = inputType;
        confirmInput.type = inputType;
    }

    document.getElementById("showPassword").addEventListener("change", togglePasswordVisibility);
</script>


<script type="text/javascript">
    // Function to toggle button loading state
    function toggleButtonLoading(button, isLoading) {
        const $button = $(button);
        if (isLoading) {
            $button.prop('disabled', true)
                .css("opacity", "0.5")
                .html($button.data('loading-text'));
        } else {
            $button.prop('disabled', false)
                .css("opacity", "1")
                .html($button.data('normal-text'));
        }
    }

    $(document).ready(function() {

        $("#registerForm").submit(function(event) {
            event.preventDefault();

            // Clear previous error messages
            $(".invalid-feedback").hide();

            // Run complete validation before submission
            if (!validateForm()) {
                return;
            }

            const loadingText = $("#submit").data('loading-text');
            $("#submit").html(loadingText);
            $("#submit").prop('disabled', true).css("opacity", "0.5");


            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var country_code = $("#country_code").val();
            var id_number = $("#id_number").val();
            var phone_no = $("#phone_no").val();
            var password = $("#password").val();
            var email_address = $("#email").val();
            var apiurl = $("#api_url").val();
            var agent_no = $("#agent_no").val();
            var source = $("#source").val();

            var phone = country_code + phone_no;
            let data_array = {
                id_number: id_number,
                first_name: first_name,
                last_name: last_name,
                email_address: email_address,
                password: password,
                phone_no: phone,
                source: source,
                agent_no: agent_no
            }


            var url = apiurl + '/register_new_client'

            $.ajax({
                type: "POST",
                url: url,
                data: JSON.stringify(data_array),
                contentType: "application/json; charset=utf-8",
                datatype: "json",
                success: function(response) {
                    $("#Otp").modal("show");
                    $("#getOtp").prop('disabled', true).css("opacity", "0.5");


                },
                error: function() {
                    Swal.fire({
                        position: "center",
                        icon: "info",
                        title: "Info !",
                        html: `<p class="lead">Your details already exist, click OK to login</p>`,
                    }).then(function() {
                        window.location.href = "/";
                    });
                }
            });
            $("#validateOTP").click((e) => {
                e.preventDefault();
                toggleButtonLoading(e.target, true);
                var validationUrl = apiurl + '/verify_signup_otp'
                var otp_password = $("#otp_password").val();
                var validation_array = {
                    phone_no: phone,
                    otp: otp_password
                }
                $.ajax({
                    type: "POST",
                    url: validationUrl,
                    data: JSON.stringify(validation_array),
                    contentType: "application/json; charset=utf-8",
                    datatype: "json",
                    success: function(response) {
                        toggleButtonLoading(e.target, false);
                        console.log(
                            "Logging the Response Member Number....................."
                        );
                        $("#Otp").modal("hide");
                        $("#getOtp").html('NEXT <i class="fa fa-arrow-right"></i>');
                        var token = $('meta[name="csrf-token"]').attr('content');
                        const userToken = response.token;
                        const member_no = response.data.member_no;

                        $.ajax({
                            type: "POST",
                            url: "{{ url('savetoken') }}",
                            data: JSON.stringify({
                                '_token': token,
                                token: userToken,
                                member_no_data: member_no
                            }),
                            contentType: "application/json; charset=utf-8",
                            datatype: "json",
                            success: function(response) {
                                window.location.href = "/biodata";
                            }
                        });;
                    },
                    error: function(request, status, error) {
                        toggleButtonLoading(e.target, false);
                        if (request.responseJSON.status_code === 401) {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Info !",
                                timer: 3000,
                                html: `<p class="lead">You have entered an Invalid OTP. You may want to Resend the OTP</p>`,
                            });
                        } else if (request.responseJSON.status_code === 403) {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Info !",
                                timer: 3000,
                                html: `<p class="lead">The OTP has expired. Please request a new OTP.</p>`,
                            });
                        } else if (request.status_code === 409) {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Info !",
                                timer: 3000,
                                html: `<p class="lead">OOPS! More than one account detected. Please contact Support.</p>`,
                            });
                            window.location.href = "/login";
                        } else if (request.responseJSON.status_code === 500) {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Info !",
                                timer: 3000,
                                html: `<p class="lead">An internal server error occurred. Please try again later.</p>`,
                            });
                        } else {
                            console.log("Unknown error:", error);
                        }
                    }
                });
            });
            $("#resendOTP").click((e) => {
                e.preventDefault();
                toggleButtonLoading(e.target, true);

                const resend_otp_url = `${apiurl}/resend_activation_otp/${phone}`;
                $.ajax({
                    url: resend_otp_url,
                    type: 'GET',
                    success: function(response) {
                        toggleButtonLoading(e.target, false);
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Success !",
                            text: "OTP has been sent to your phone",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    },
                    error: function(request, status, error) {
                        toggleButtonLoading(e.target, false);
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Error !",
                            text: "Failed to resend OTP. Please try again.",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }
                });
            });
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize Select2 for country code select
        $('#country_code').select2({
            placeholder: '--Select Country--',
            width: '100%',
            dropdownAutoWidth: true,
            templateResult: function(item) {
                if (!item.id) return item.text;
                return $('<span>+ ' + item.text + '</span>');
            }
        }).on('select2:open', function() {
            setTimeout(function() {
                $('.select2-search__field').focus();
            }, 0);
        });

        $('#Otp').on('hidden.bs.modal', function() {
            $("#submit").html("Submit");
            $("#submit").prop('disabled', false).css("opacity", "1");
            // location.reload();
        });
    });
</script>
@endsection --}}
