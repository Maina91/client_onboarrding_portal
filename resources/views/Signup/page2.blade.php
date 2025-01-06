@extends('layouts.registration_layout')
@section('content')
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 mt-4">
                <h3 class="font-weight-bold">Enter Biodata</h3>
                <div class="card mt-4 shadow">
                    <div class="card-body p-4">
                        <form autocomplete="off" method="post" id="biodata">
                            {{ method_field('POST') }}
                            @csrf
                            {{-- <input type="hidden" name="api_url" id="api_url" value="{{ $web_api_url }}">
                            <input type="hidden" name="temporary_id" id="temporary_id" value="{{ $temporary_id }}">
                            <input type="hidden" name="auth_token" id="auth_token" value="{{ $jwt_token }}">
                            <input type="hidden" name="mobile_no" id="mobile_no" value="{{ $phone_number }}">
                            <input type="hidden" name="email_address" id="email_address"
                                value="{{ $preData->email_address }}"> --}}

                            <div class="form-row row mb-0">
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="salutation" class="form-label">Salutation <i
                                            class="text-danger">*</i></label>
                                    <select class="form-select form-select-sm" name="salutation" id="salutation" required>
                                        <option value="" disabled selected>--Select--</option>
                                        {{-- @foreach ($salutation as $salutations)
                                            <option value="{{ $salutations->name }}">{{ ucwords($salutations->name) }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="first_name" class="form-label">First Name <i
                                            class="text-danger">*</i></label>
                                    {{-- <input type="text" class="form-control form-control-rounded readonly"
                                        name="first_name" id="first_name" value="{{ $preData->first_name }}" readonly
                                        required /> --}}
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                            </div>

                            <div class="form-row row mb-0">
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control form-control-rounded" name="middle_name"
                                        id="middle_name" />
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="last_name" class="form-label">Last Name <i class="text-danger">*</i></label>
                                    {{-- <input type="text" class="form-control form-control-rounded readonly"
                                        name="last_name" id="last_name" value="{{ $preData->last_name }}" readonly
                                        required /> --}}
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                            </div>

                            <div class="form-row row mb-0">
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="dob" class="form-label">Date of Birth <i
                                            class="text-danger">*</i></label>
                                    <input type="date" class="form-control form-control-rounded" name="dob"
                                        id="dob" required />
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="gender" class="form-label">Gender <i class="text-danger">*</i></label>
                                    <select class="form-select form-select-sm" name="gender" id="gender" required>
                                        <option value="" disabled selected>--Select--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                            </div>

                            <div class="form-row row mb-0">
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="id_number" class="form-label">ID/Passport No <i
                                            class="text-danger">*</i></label>
                                    {{-- <input type="text" class="form-control form-control-rounded readonly"
                                        name="id_number" id="id_number" value="{{ $preData->identification_no }}" readonly
                                        required /> --}}
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="kra_no" class="form-label">KRA Pin <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-rounded" name="kra_no"
                                        id="kra_no" required />
                                    <div class="invalid-feedback" id="kraError">This field is required.</div>
                                </div>
                            </div>

                            <div class="form-row row mb-0">
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="country_of_residence">Country of Residence <i
                                            class="text-danger">*</i></label>
                                    {{-- <input type="hidden" name="default_country_id" id="default_country_id"
                                        value="{{ $defaultCountryID }}"> --}}
                                    <select id="country_of_residence" name="country_of_residence" class="select2-container"
                                        required>
                                        <option value="" disabled selected>--Select--</option>
                                        {{-- @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ ucwords($country->name) }}</option>
                                        @endforeach --}}
                                    </select>
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                                <div class="form-group col-md-6 input-group-sm">
                                    <label for="town">Town of Residence <i class="text-danger">*</i></label>
                                    <select id="town" name="town" class="select2-container" required>
                                        <option value="" disabled selected>--Select Town--</option>
                                    </select>
                                    <div class="invalid-feedback">This field is required.</div>
                                </div>
                            </div>

                            <div class="form-row row mb-0">
                                {{-- <input type="hidden" name="agent" value="{{ $agent }}">
                                @if (is_null($agent))
                                    <div class="form-group col-md-6 input-group-sm">
                                        <label for="financial_advisor" class="form-label">Financial Advisor <i
                                                class="text-danger">*</i></label>
                                        <select name="financial_advisor" id="financial_advisor"
                                            class="form-select form-select-sm" required>
                                            <option value="">--Select--</option>
                                            @foreach ($advisors as $advisor)
                                                <option value="{{ $advisor->agent_no }}"
                                                    {{ $advisor->agent_no === '00001' ? 'selected' : '' }}>
                                                    {{ ucwords($advisor->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">This field is required.</div>
                                    </div>

                                    <div class="form-group col-md-6 input-group-sm">
                                    @else
                                        <input type="hidden" name="financial_advisor" id="financial_advisor"
                                            value="{{ $agent }}">
                                        <div class="form-group col-md-12 input-group-sm">
                                @endif --}}

                                <label for="fund" class="form-label">Fund <i class="text-danger">*</i></label>
                                <select name="sec_code" id="sec_code" class="form-select form-select-sm">
                                    <option value="" disabled>--Select Fund--</option>
                                    {{-- @foreach ($securities as $fund)
                                        <option value="{{ $fund->security_code }}">
                                            {{ ucwords($fund->fund_name) }}
                                        </option>
                                    @endforeach --}}
                                </select>
                                <div class="invalid-feedback">This field is required.</div>
                            </div>
                    </div>

                    <div class="form-row row mb-0">
                        <div class="form-group col-md-12 input-group-sm">
                            <label for="physical_address" class="form-label">Physical Address <i
                                    class="text-danger">*</i></label>
                            <input type="text" class="form-control form-control-rounded" name="physical_address"
                                id="physical_address" required />
                            <div class="invalid-feedback">This field is required.</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-next" id="submit" title="submit" type="submit"
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
@endsection

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script> --}}


{{-- <script>
        $(document).ready(function() {

            $('#country_of_residence').select2({
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

            $('#town').select2({
                placeholder: '--Select Town--',
                width: '100%',
                dropdownAutoWidth: true,
                templateResult: function(item) {
                    if (!item.id) return item.text;
                    return $('<span> ' + item.text + '</span>');
                }
            }).on('select2:open', function() {
                setTimeout(function() {
                    $('.select2-search__field').focus();
                }, 0);
            });

            $("#country_of_residence").on("change", () => {
                let default_country_id_value = $(`#country_of_residence`).val();
                const loadTownsUrl = `${window.location.origin}/towns/${default_country_id_value}`;

                // Clear existing options
                $("#town").empty().append('<option value="" disabled selected>--Select Town--</option>');
                getData(loadTownsUrl)
                    .then((data) => {
                        $.each(data, function(i, item) {
                            const name = item.name.toLowerCase();
                            $("#town").append(
                                $("<option>", {
                                    value: item.id,
                                    text: name,
                                })
                            );
                        });
                        // Trigger Select2 to update after adding new options
                        $("#town").trigger('change');
                    })
                    .catch((err) => {
                        console.error("Error loading towns:", err);
                    });
            });
            async function getData(url) {
                const response = await fetch(url);
                return response.json();
            }
        });

        // Helper function to toggle submit button
        function toggleSubmitButton(isValid) {
            const button = document.getElementById("submit");
            button.disabled = !isValid;
            button.style.opacity = isValid ? "1" : "0.5";
        }


        $('#kra_no').on('input blur', function() {
            var input = $(this).val().trim();
            var kraError = $('#kraError');
            var isValid = true;



            // Limit to 11 characters
            if (input.length > 11) {
                input = input.substr(0, 11);
                $(this).val(input);
            }

            // Validate KRA PIN format
            if (input) {
                if (!/^[a-zA-Z][0-9]{9}[a-zA-Z]$/.test(input)) {
                    $(this).addClass('is-invalid');
                    kraError.text(
                        'Invalid KRA PIN format. Format should be: Letter + 9 numbers + Letter (e.g., A123456789B)'
                    );
                    isValid = false;
                } else {
                    $(this).removeClass('is-invalid');
                    kraError.text('');
                    isValid = true;
                }
            } else {
                $(this).removeClass('is-invalid');
                kraError.text('');
                isValid = true;
            }

            toggleSubmitButton(isValid);
        });

        $("#submit").click(function(event) {
            event.preventDefault();

            // Clear previous error messages
            $(".invalid-feedback").hide();
            let valid = true;


            // Array of required fields
            const requiredFields = [
                'salutation',
                'middle_name',
                'dob',
                'gender',
                'kra_no',
                'physical_address',
                'financial_advisor',
                'sec_code'
            ];

            // Check if all required fields are filled
            requiredFields.forEach(function(field) {
                const input = $(`#${field}`);
                if (!input.val()) {
                    input.next('.invalid-feedback').show(); // Show error message if field is empty
                    valid = false; // Set valid to false
                } else {
                    input.next('.invalid-feedback').hide(); // Hide error message if field is filled
                }
            });

            // If validation fails, prevent form submission
            if (!valid) {
                return;
            }
            const loadingText = $("#submit").data('loading-text');
            $("#submit").html(loadingText);
            $("#submit").prop('disabled', true).css("opacity", "0.5");

            const salutation = document.getElementById('salutation');
            const firstName = document.getElementById('first_name');
            const middleName = document.getElementById('middle_name');
            const lastName = document.getElementById('last_name');
            const dob = document.getElementById('dob');
            const gender = document.getElementById('gender');
            const idNumber = document.getElementById('id_number');
            const kraNo = document.getElementById('kra_no');
            const countryOfResidence = document.getElementById('country_of_residence');
            const town = document.getElementById('town');
            const physicalAddress = document.getElementById('physical_address');
            const financialAdvisor = document.getElementById('financial_advisor');
            const server_url = document.getElementById('api_url').value;
            const temporary_id = document.getElementById('temporary_id').value;
            const auth_token = document.getElementById('auth_token').value;
            const mobile_no = document.getElementById('mobile_no');
            const email_address = document.getElementById('email_address');
            const sec_code = document.getElementById('sec_code');

            const update_member_details = {
                salutation: salutation.value,
                first_name: firstName.value,
                other_name: middleName.value,
                last_name: lastName.value,
                dob: dob.value,
                gender: gender.value,
                identification_no: idNumber.value,
                tax_no: kraNo.value,
                country_id: countryOfResidence.value,
                town: town.value,
                physical_address: physicalAddress.value,
                financial_advisor: financialAdvisor.value,
                sec_code: sec_code.value,
                mobile_no: mobile_no.value,
                email_address: email_address.value,
                member_type: "Single Member",
                is_employed: "1",
                industry: "0",
                company_id: "0",
                occupation_id: "0",
                sms_notification: "1",
                county_state: "0",
                sms_reply: "1",
                tax_exempt: "0",
                statement_via: "1",
                marital_status: "1",
                income_source: "Salary",
                accrued_interest: "0",
            };

            async function postDataWithToken(url = "", data = {}) {
                const response = await fetch(url, {
                    method: "POST",
                    mode: "cors",
                    cache: "no-cache",
                    credentials: "omit",
                    headers: {
                        "Content-Type": "application/json",
                        "auth-token": auth_token,
                    },
                    redirect: "follow",
                    referrerPolicy: "no-referrer",
                    body: JSON.stringify(data),
                });

                return response.json();
            }

            const update_member_details_url = `${server_url}/update_member_details/${temporary_id}`;
            // console.log(server_url);

            postDataWithToken(update_member_details_url, update_member_details)
                .then((response) => {
                    // console.log(response);
                    if (response.status_code === 200) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Congratulations!",
                            text: response.message,
                            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Proceed!',
                        }).then(() => {
                            window.location.replace("/finalize");
                        });
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Error Encountered!",
                            text: response.message,
                            showConfirmButton: true,
                        });
                    }
                })
                .catch((err) => {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Error Encountered!",
                        text: err.message,
                        showConfirmButton: true,
                    });
                });
        });
    </script> --}}
{{-- @endsection --}}
