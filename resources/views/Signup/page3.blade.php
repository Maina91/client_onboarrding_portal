@extends('layouts.registration_layout')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"); <div
        class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 mt-5">
            <h3 class="font-weight-bold">Finalize Registration</h3>
            <div class="card mt-4 mb-5 shadow">
                <div class="card-body p-4">
                    <form autocomplete="off" method="post" id="final">
                        {{ method_field('POST') }}
                        @csrf

                        {{-- <input type="hidden" name="api_url" id="api_url" value="{{ $apiUrl }}">
                        <input type="hidden" name="auth_token" id="auth_token" value="{{ $jwt_token }}">
                        <input type="hidden" name="temporary_id" id="temporary_id" value="{{ $temporary_id }}">
                        <input type="hidden" name="member_no" id="member_no" value="{{ $member_no }}">
                        <input type="hidden" id="edit_beneficiaryId" name="unque_id" value=""> --}}

                        <div class="form-row row mb-0">
                            <div class="form-group col-md-6 input-group-sm">
                                <label for="id_front" class="form-label">ID Front <i class="text-danger">*</i></label>
                                <input type="file" class="form-control form-control-rounded" name="id_front"
                                    id="id_front" required />
                                <div class="invalid-feedback">This field is required.</div>
                            </div>
                            <div class="form-group col-md-6 input-group-sm">
                                <label for="id_back" class="form-label">ID Back <i class="text-danger">*</i></label>
                                <input type="file" class="form-control form-control-rounded" name="id_back"
                                    id="id_back" required />
                                <div class="invalid-feedback">This field is required.</div>
                            </div>
                        </div>

                        <div class="form-row row mb-0">
                            <div class="form-group col-md-6 input-group-sm">
                                <label for="proof_of_bank" class="form-label">
                                    Proof of Bank<i class="text-danger">*</i>
                                    <small class="text-muted d-block" style="font-size: 0.85em;">
                                        Front side of ATM / Bank Statement / Original Canceled Cheque
                                    </small>
                                </label>
                                <input type="file" class="form-control form-control-rounded" name="proof_of_bank"
                                    id="proof_of_bank" required />
                                <div class="invalid-feedback">This field is required.</div>
                            </div>
                            <div class="form-group col-md-6 input-group-sm">
                                <label for="kra_pin" class="form-label">KRA PIN</label>
                                <small class="text-muted d-block" style="font-size: 0.85em;">
                                    &nbsp;
                                </small>
                                <input type="file" class="form-control form-control-rounded" name="kra_pin"
                                    id="kra_pin" required />
                                <div class="invalid-feedback">This field is required.</div>
                            </div>
                        </div>

                        <h5 class="mt-1 mb-1">Bank Details</h5>
                        <div class="form-row row mb-0">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-responsive table-condensed" id="BankTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-left">Bank</th>
                                                <th class="text-left">Branch</th>
                                                <th class="text-left">Currency</th>
                                                <th class="text-left">Account Name</th>
                                                <th class="text-left">Account Number</th>
                                                <th>
                                                    <button type="button" class="btn btn-success" onClick="addBankItem();">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="banktable">
                                            <tr>
                                                <td>
                                                    <select id="bank_code" name="bank_code[]"
                                                        class="form-select form-select-sm" style="min-width: 180px;">
                                                        <option value="" disabled selected>--Select--</option>
                                                        {{-- @foreach ($banks as $bank)
                                                            <option value="{{ $bank->bank_code }}">
                                                                {{ implode(
                                                                    ' ',
                                                                    array_map(function ($word) {
                                                                        return in_array(strtolower($word), ['of', 'or']) ? strtolower($word) : ucwords(strtolower($word));
                                                                    }, explode(' ', $bank->name)),
                                                                ) }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                    <div class="invalid-feedback">This field is required.</div>
                                                </td>
                                                <td>
                                                    <select id="clearing_code" name="clearing_code[]"
                                                        class="form-select form-select-sm" style="min-width: 150px;">
                                                        <option value="">--Select--</option>
                                                    </select>
                                                    <div class="invalid-feedback">This field is required.</div>
                                                </td>
                                                <td>
                                                    <select class="form-select form-select-sm" name="currency[]"
                                                        id="currency" style="min-width: 120px;">
                                                        <option value="" disabled selected>--Select--</option>
                                                        {{-- @foreach ($currencytypes as $currency)
                                                            <option value="{{ $currency->currency_code }}">
                                                                {{ ucwords($currency->currency_code) }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                    <div class="invalid-feedback">This field is required.</div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="account_name[]" id="account_name"
                                                            placeholder="Account Name" style="min-width: 180px;" required />
                                                        <br>
                                                        <div class="invalid-feedback">This field is required.</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="account_number[]" id="account_number"
                                                            placeholder="Account Number"
                                                            oninput="validateAccountNumber(this)" pattern="[0-9]*"
                                                            style="min-width: 150px;" required />
                                                        <br>
                                                        <div class="invalid-feedback">This field is required.</div>
                                                        <small class="text-danger error-message"
                                                            style="display: none;">Please enter numbers only</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger removeitem" type="button"
                                                        onclick="deleteRow(this)" tabindex="8">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-1 mb-1">Beneficiary Details</h5>
                        <div class="form-row row mb-0">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-condensed" id="item_table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-left">Full Name</th>
                                                <th class="text-left">Relationship</th>
                                                <th class="text-left">Phone Number </th>
                                                <th class="text-left">ID/Passport Number </th>
                                                <th class="text-left">Email </th>
                                                <th scope="col">Percentage</th>
                                                <th> <button type="button" class="btn btn-success"
                                                        onClick="addItem('itmetable');"><i
                                                            class="fa fa-plus"></i></button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="itmetable">
                                            <tr>
                                                <td><input type="text" name="kin_full_name[]"
                                                        class="form-control form-control-sm" placeholder="Full Name"
                                                        id="full_name" required style="min-width: 180px;"></td>
                                                <td><select class="form-select form-select-sm" name="kin_relationship[]"
                                                        required style="min-width: 150px;">
                                                        <option value="" disabled selected>--Select--</option>
                                                        {{-- @foreach ($relationships as $relationship)
                                                         
                                                            <option value="{{ $relationship->relation_title }}">
                                                                {{ $relationship->relation_title }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select></td>
                                                <td> <input type="text" name="kin_mobile[]"
                                                        class="form-control form-control-sm" placeholder="Phone"
                                                        id="mobile" required style="min-width: 150px;"></td>
                                                <td> <input type="text" name="kin_id_passport_number[]"
                                                        class="form-control form-control-sm"
                                                        placeholder="ID/Passport Number" id="kin_id_passport_number"
                                                        style="min-width: 150px;"></td>
                                                <td> <input type="email" name="kin_email[]"
                                                        class="form-control form-control-sm" placeholder="Email Address"
                                                        id="email" style="min-width: 180px;"></td>
                                                <td> <input type="number" name="kin_percentage[]"
                                                        class="form-control form-control-sm"
                                                        placeholder="Percentage allocation" id="kin_id_passport_number"
                                                        style="min-width: 120px;"></td>
                                                <td><button class="btn btn-danger removeitem" type="button"
                                                        onclick="deleteRow(this)" tabindex="8"><i
                                                            class="fa fa-close"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row mt-2 mb-0">
                            <div class="form-group col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms_conditions"
                                        name="terms_conditions" required>
                                    <label class="form-check-label" for="terms_conditions">
                                        Accept our <a href="https://kuza.africa/terms-and-conditions/" target="_blank"
                                            class="terms-link">Terms and
                                            Conditions</a>
                                    </label>
                                    <div class="invalid-feedback">
                                        You must accept the terms and conditions.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-sm text-muted-foreground">
                            <P>You agree to our Terms of Service and Privacy Policy.</P>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-next btn-lg px-5" id="submit" title="submit" type="submit"
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

{{-- 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

{{-- <script>
        "use strict";

        function addBankItem() {
            var tableBody = document.getElementById("banktable");

            var newRow = document.createElement("tr");

            newRow.innerHTML = `
            <td>
                <select name="bank_code[]" class="form-select form-select-sm" style="min-width: 180px;">
                    <option value="" disabled selected>--Select--</option>
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->bank_code }}">
                            {{ implode(
                                ' ',
                                array_map(function ($word) {
                                    return in_array(strtolower($word), ['of', 'or']) ? strtolower($word) : ucwords(strtolower($word));
                                }, explode(' ', $bank->name)),
                            ) }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">This field is required.</div>
            </td>
            <td>
                <select name="clearing_code[]" class="form-select form-select-sm" style="min-width: 150px;">
                    <option value="">--Select--</option>
                </select>
                <div class="invalid-feedback">This field is required.</div>
            </td>
            <td>
                <select name="currency[]" class="form-select form-select-sm" style="min-width: 120px;">
                    <option value="" disabled selected>--Select--</option>
                    @foreach ($currencytypes as $currency)
                        <option value="{{ $currency->currency_code }}">{{ ucwords($currency->currency_code) }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">This field is required.</div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" name="account_name[]" placeholder="Account Name" style="min-width: 180px;" required />
                    <br>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" name="account_number[]" 
                        id="account_number" 
                        placeholder="Account Number" 
                        oninput="validateAccountNumber(this)"
                        pattern="[0-9]*" style="min-width: 150px;" required />
                        <br>
                    <div class="invalid-feedback">This field is required.</div>
                    <small class="text-danger error-message" style="display: none;">Please enter numbers only</small>
                </div>
            </td>
            <td>
                <button class="btn btn-danger removeitem" type="button" onclick="deleteRow(this)" tabindex="8">
                    <i class="fa fa-close"></i>
                </button>
            </td>
        `;

            tableBody.appendChild(newRow);
        }

        function deleteRow(button) {
            const row = button.closest("tr");
            const table = row.closest("tbody");

            if (table.rows.length > 1) {
                row.remove();
            }
        }

        // Event delegation for dynamically added bank_code elements
        $(document).on("change", "#BankTable select[name='bank_code[]']", function() {
            const bankCode = $(this).val();
            const clearingCodeDropdown = $(this).closest("tr").find("select[name='clearing_code[]']");

            // Clear and set default option for the branch dropdown
            clearingCodeDropdown.empty().append(
                $("<option>", {
                    value: "",
                    text: "--Select Bank Branch--",
                    disabled: true,
                    selected: true
                })
            );

            const loadBranchesUrl = `${window.location.origin}/bank_branches/${bankCode}`;
            getData(loadBranchesUrl)
                .then((data) => {
                    $.each(data, function(i, item) {
                        clearingCodeDropdown.append(
                            $("<option>", {
                                value: item.clearing_code,
                                text: item.branch_name.toLowerCase(),
                            })
                        );
                    });
                })
                .catch((err) => {
                    console.log("Error when loading bank branches:", err);
                });
        });

        async function getData(url) {
            const response = await fetch(url);
            return response.json();
        }

        function addItem(t) {
            var row = $("#item_table tbody tr").length;
            var count = row + 1;
            var limits = 500;
            var xTable = document.getElementById('item_table');
            var tr = document.createElement('tr');
            tr.innerHTML =
                '<td><input  type="text" name="kin_full_name[]" class="form-control form-control-sm" placeholder="Full Name" id="full_name" required style="min-width: 180px;"></td>\n\
                                                                                                                                                                                                                                                                                                                                                                    <td><select class="form-select form-select-sm" name="kin_relationship[]" required style="min-width: 150px;">\n\
                                                                                                                                                                                                                                                                                                                                                                         <option value="" disabled selected>--Select--</option>\n\
                                                                                                                                                                                                                                                                                                                                                                        @foreach ($relationships as $relationship)\n\
                                                                                                                                                                                                                                                                                                                                                                        <option value="{{ $relationship->relation_title }}">{{ $relationship->relation_title }}</option>\n\
                                                                                                                                                                                                                                                                                                                                                                        @endforeach\n\
                                                                                                                                                                                                                                                                                                                                                                        </select></td>\n\
                                                                                                                                                                                                                                                                                                                                                                    <td> <input  type="text" name="kin_mobile[]" class="form-control form-control-sm" placeholder="Phone" id="mobile" required style="min-width: 150px;"></td>\n\
                                                                                                                                                                                                                                                                                                                                                                    <td> <input  type="text" name="kin_id_passport_number[]" class="form-control form-control-sm" placeholder="ID/Passport Number" id="kin_id_passport_number" style="min-width: 150px;"></td>\n\
                                                                                                                                                                                                                                                                                                                                                                    <td> <input  type="email" name="kin_email[]" class="form-control form-control-sm" placeholder="Email Address" id="email" style="min-width: 180px;"></td>\n\
                                                                                                                                                                                                                                                                                                                                                                    <td> <input  type="number" name="kin_percentage[]" class="form-control form-control-sm" placeholder="Percentage allocation" id="kin_id_passport_number" style="min-width: 120px;"></td>\n\
                                                                                                                                                                                                                                                                                                                        <td><button  class="btn btn-danger removeitem" type="button"  onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button></td>';

            document.getElementById(t).appendChild(tr);
        }

        // $(document).on('click', 'button.removeitem', function() {
        //     $(this).closest('tr').remove();
        //     return false;
        // });

        function validateAccountNumber(input) {
            const errorMessage = input.parentElement.querySelector('.error-message');
            if (!/^\d*$/.test(input.value)) {
                input.value = input.value.replace(/[^\d]/g, '');
                errorMessage.style.display = 'block';
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 3000);
            } else {
                errorMessage.style.display = 'none';
            }
        }
    </script> --}}

{{-- <script>
        $(document).ready(function() {
            let beneficiaryCounter = 0;

            $("#bank_code").on("change", function() {
                var bankCode = $(this).val();
                $("#clearing_code").empty();

                $("#clearing_code").append(
                    $("<option>", {
                        value: "",
                        text: "--Select Bank Branch--",
                        disabled: true,
                        selected: true
                    })
                );

                const loadBranchesUrl = `${window.location.origin}/bank_branches/${bankCode}`;
                getData(loadBranchesUrl)
                    .then((data) => {
                        $.each(data, function(i, item) {
                            const branchName = item.branch_name.toLowerCase();
                            $("#clearing_code").append(
                                $("<option>", {
                                    value: item.clearing_code,
                                    text: branchName,
                                })
                            );
                        });
                    })
                    .catch((err) => {
                        console.log("Error when loading bank branches:", err);
                    });
            });

            async function getData(url) {
                const response = await fetch(url);
                return response.json();
            }

            // Function to calculate total percentage
            function calculateTotalPercentage() {
                let totalPercentage = 0;
                $('#item_table tbody tr').each(function() {
                    let currentPercentage = parseFloat($(this).find('input[name="kin_percentage[]"]')
                        .val()) || 0;
                    totalPercentage += currentPercentage;
                });
                return totalPercentage;
            }

            $("#submit").click(function(event) {
                event.preventDefault();

                // Clear previous error messages
                $(".invalid-feedback").hide();
                let valid = true;

                // Array of required fields
                const requiredFields = [
                    'id_front',
                    'id_back',
                    // 'kra_pin',
                    'proof_of_bank',
                ];

                // Check if all required fields are filled
                requiredFields.forEach(function(field) {
                    const input = $(`#${field}`);
                    if (!input.val()) {
                        input.next('.invalid-feedback').show();
                        valid = false;
                    } else {
                        input.next('.invalid-feedback').hide();
                    }
                });

                if (!valid) {
                    return;
                }

                // Table validation: Check if any row has missing required fields
                let tableValid = true;
                $("#banktable tr").each(function() {
                    var bankCode = $(this).find('select[name="bank_code[]"]');
                    var clearingCode = $(this).find('select[name="clearing_code[]"]');
                    var currency = $(this).find('select[name="currency[]"]');
                    var accountName = $(this).find('input[name="account_name[]"]');
                    var accountNumber = $(this).find('input[name="account_number[]"]');

                    // Reset previous error states
                    $(this).find('.invalid-feedback').hide();

                    // Validate bank code
                    if (!bankCode.val()) {
                        bankCode.next('.invalid-feedback').show();
                        tableValid = false;
                    }

                    // Validate account name
                    if (!accountName.val()) {
                        accountName.closest('.form-group').find('.invalid-feedback').show();
                        tableValid = false;
                    }

                    // Validate clearing code
                    if (!clearingCode.val()) {
                        clearingCode.next('.invalid-feedback').show();
                        tableValid = false;
                    }

                    // Validate currency
                    if (!currency.val()) {
                        currency.next('.invalid-feedback').show();
                        tableValid = false;
                    }

                    // Validate account number
                    if (!accountNumber.val()) {
                        accountNumber.closest('.form-group').find('.invalid-feedback').show();
                        tableValid = false;
                    } else if (!/^\d+$/.test(accountNumber.val())) {
                        accountNumber.closest('.form-group').find('.error-message').show();
                        tableValid = false;
                    }
                });


                if (!tableValid) {
                    valid = false;
                    return; // Stop form submission if any fields are invalid
                }

                function hasBeneficiaryData() {
                    let hasData = false;
                    $('#item_table tbody tr').each(function() {
                        const fullName = $(this).find('input[name="kin_full_name[]"]').val();
                        const relationship = $(this).find('select[name="kin_relationship[]"]')
                            .val();
                        const phone = $(this).find('input[name="kin_mobile[]"]').val();
                        const email = $(this).find('input[name="kin_email[]"]').val();
                        const percentage = $(this).find('input[name="kin_percentage[]"]').val();
                        const kin_id_passport_number = $(this).find(
                            'input[name="kin_id_passport_number[]"]').val();

                        if (fullName && relationship && phone && email && percentage &&
                            kin_id_passport_number) {
                            hasData = true;
                            return false; // break the loop if we find at least one complete row
                        }
                    });
                    return hasData;
                }
                if (hasBeneficiaryData()) {
                    // Calculate total percentage
                    const totalPercentage = calculateTotalPercentage();

                    // Validate if total percentage equals 100
                    if (totalPercentage !== 100) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Total Percentage',
                            html: `Total percentage allocation must equal 100%.<br>Current total: ${totalPercentage}%.`,
                        });
                        return; // Prevent submission
                    }

                }


                const isTermsAccepted = $('#terms_conditions').is(':checked');
                if (!isTermsAccepted) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Terms and Conditions",
                        text: "Please Agree to Our Terms and Conditions",
                        showConfirmButton: true,
                    });
                    return;
                }

                const loadingText = $("#submit").data('loading-text');
                $("#submit").html(loadingText);
                $("#submit").prop('disabled', true).css("opacity", "0.5");

                const api_url = document.getElementById('api_url').value;
                const bank_details_url = `${api_url}/register_bank_list`;
                const beneficiary_url = `${api_url}/register_beneficiary`;
                const documents_url = `${api_url}/documents`;
                const terms_and_conditions_url = `${api_url}/terms_and_conditions`;

                const auth_token = document.getElementById('auth_token').value;

                // Beneficiaries payload
                function extractBankData() {
                    const table = document.getElementById('banktable');
                    const rows = table.getElementsByTagName('tr');
                    const bankDetails = [];
                    const member_no = document.getElementById('member_no').value;

                    for (let i = 0; i < rows.length; i++) {
                        const row = rows[i];
                        const bank_code = row.querySelector('[name="bank_code[]"]')?.value;
                        const branchcode = row.querySelector('[name="clearing_code[]"]')?.value;
                        const currencycode = row.querySelector('[name="currency[]"]')?.value;
                        const accountname = row.querySelector('[name="account_name[]"]')?.value;
                        const accountno = row.querySelector('[name="account_number[]"]')?.value;

                        // Ensure all required fields are populated
                        if (bank_code && branchcode && currencycode && accountname && accountno) {
                            bankDetails.push({
                                bankcode: bank_code,
                                branchcode: branchcode,
                                currencycode: currencycode,
                                accountname: accountname,
                                accountno: accountno,
                                accounttype: "savings",
                                added_by: "User",
                                member_no: member_no,
                                trans_id: parseInt(member_no),
                            });
                        }
                    }

                    return {
                        bank_details: bankDetails
                    };
                }

                const bank_details_payload = extractBankData();

                // Beneficiaries payload
                function extractBeneficiaryData() {
                    var tableData = [];
                    var table = document.getElementById('item_table');
                    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

                    for (var i = 0; i < rows.length; i++) {
                        var row = rows[i];
                        var fullName = row.querySelector('input[name="kin_full_name[]"]').value;
                        var relationship = row.querySelector('select[name="kin_relationship[]"]').value;
                        var mobile = row.querySelector('input[name="kin_mobile[]"]').value;
                        var email = row.querySelector('input[name="kin_email[]"]').value;
                        var percentage = row.querySelector('input[name="kin_percentage[]"]').value;
                        var id_no = row.querySelector('input[name="kin_id_passport_number[]"]').value;

                        if (fullName && relationship && mobile && email && percentage && id_no) {
                            tableData.push({
                                allnames: fullName,
                                relationship: relationship,
                                gsm_no: mobile,
                                email: email,
                                percentage: percentage,
                                id_no: id_no,
                            });
                        }
                    }

                    return tableData;
                }

                const beneficiaries_payload = extractBeneficiaryData();

                // Documents payload
                const formData = new FormData();
                formData.append('id_front', document.getElementById('id_front').files[0]);
                formData.append('id_back', document.getElementById('id_back').files[0]);

                const kraPinFile = document.getElementById('kra_pin').files[0];
                const proofOfBankFile = document.getElementById('proof_of_bank').files[0];

                if (kraPinFile && kraPinFile.size !== 0) {
                    formData.append('kra_pin', kraPinFile);
                } else if (proofOfBankFile) {
                    formData.append('kra_pin', proofOfBankFile);
                }

                formData.append('proof_of_bank', proofOfBankFile);
                formData.append('passport_photo', document.getElementById('id_front').files[0]);

                async function postDataWithToken(url = "", data = {}) {
                    const response = await fetch(url, {
                        method: "POST",
                        mode: "cors",
                        cache: "no-cache",
                        credentials: "omit",
                        headers: {
                            "Content-Type": "application/json",
                            "Access-Control-Allow-Origin": "*",
                            "Access-Control-Allow-Credentials": "true",
                            "auth-token": auth_token,
                        },
                        redirect: "follow",
                        referrerPolicy: "no-referrer",
                        body: JSON.stringify(data),
                    });

                    return response.json();
                }

                async function postFormData(url = "", data = {}) {
                    const response = await fetch(url, {
                        method: "POST",
                        headers: {
                            "Access-Control-Allow-Origin": "*",
                            "Access-Control-Allow-Credentials": "true",
                            "auth-token": auth_token,
                        },
                        body: data,
                    });

                    return response.json();
                }

                const terms_and_conditions_payload = {
                    customer_response: 1
                };

                const promises = [
                    postFormData(documents_url, formData),
                    postDataWithToken(bank_details_url, bank_details_payload)
                ];

                if (hasBeneficiaryData()) {
                    promises.push(postDataWithToken(beneficiary_url, beneficiaries_payload));
                }

                Promise.all(promises)
                    .then((responses) => {
                        const allSuccessful = responses.every(response => response.status_code === 200);

                        if (allSuccessful) {
                            return postDataWithToken(terms_and_conditions_url,
                                    terms_and_conditions_payload)
                                .then(termsResponse => {
                                    if (termsResponse.status_code === 200) {
                                        Swal.fire({
                                            position: "center",
                                            icon: "success",
                                            title: "Congratulations!",
                                            text: "Details captured successfully",
                                            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Proceed!',
                                        }).then(() => {
                                            window.location.replace("/payment");
                                        });
                                    } else {
                                        throw new Error("Terms and conditions request failed");
                                    }
                                });
                        } else {
                            throw new Error("One or more requests failed");
                        }
                    })
                    .catch((error) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Submission Failed',
                            text: 'There was an error submitting the details. Please try again later.',
                        });
                        console.error('Error:', error);
                    })
                    .finally(() => {
                        $("#submit").prop('disabled', false).css("opacity", "1").html("Submit");
                    });
            });


        });
    </script> --}}
{{-- @endsection --}}
