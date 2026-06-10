@extends('user.partials.app')

@section('title', 'Create Quotation')

@section('content')

<div class="container-fluid py-4 mb-4">

    <div class="mb-4">
        <h3 class="mb-0">Create Quotation</h3>
        <small class="text-muted">Build invoice by selecting client and services</small>
    </div>

    <form action="{{ route('quotations.store') }}" method="POST">
        @csrf

        <div class="row g-4">

            {{-- LEFT --}}
            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 p-3">

                    {{-- CLIENT --}}
                    <label class="form-label">Select Client</label>
                    <select name="client_id" class="form-control mb-3" required>
                        <option value="">Choose Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">
                                {{ $client->client_name }}
                            </option>
                        @endforeach
                    </select>

                    {{-- NOTES --}}
                    <label class="form-label">Notes</label>
                    <textarea name="notes"
                              class="form-control"
                              rows="4"
                              placeholder="Optional notes..."></textarea>

                    <hr>

                    <div>
                        <div class="d-flex justify-content-between">
                            <span>Subtotal:</span>
                            <strong id="subtotal">0.00</strong>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>VAT (5%):</span>
                            <strong id="vat">0.00</strong>
                        </div>

                        <div class="d-flex justify-content-between fs-5 mt-2">
                            <span>Total:</span>
                            <strong id="total">0.00</strong>
                        </div>
                    </div>

                    <button type="submit"
                            class="btn btn-primary w-100 mt-3">
                        Generate Quotation
                    </button>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-md-8">

                <div class="card border-0 shadow-sm rounded-4 p-3">

                    <h5 class="mb-3">Services</h5>

                    <table class="table" id="serviceTable">

                        <thead>
                            <tr>
                                <th>Service</th>
                                <th width="120">Qty</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>

                        <tbody id="serviceBody">

                            <tr>
                                <td>
                                    <select name="items[0][service_id]"
                                            class="form-control service"
                                            onchange="calc()">

                                        <option value="">Select Service</option>

                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}"
                                                    data-price="{{ $service->unit_price }}">
                                                {{ $service->service_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </td>

                                <td>
                                    <input type="number"
                                           name="items[0][quantity]"
                                           class="form-control qty"
                                           value="1"
                                           oninput="calc()">
                                </td>

                                <td>
                                    <button type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="removeRow(this)">
                                        X
                                    </button>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                    <button type="button"
                            class="btn btn-dark btn-sm"
                            onclick="addRow()">
                        + Add Service
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

<script>
let index = 1;

function addRow() {

    let row = `
    <tr>

        <td>
            <select name="items[${index}][service_id]"
                    class="form-control service"
                    onchange="calc()">

                <option value="">Select Service</option>

                @foreach($services as $service)
                    <option value="{{ $service->id }}"
                            data-price="{{ $service->unit_price }}">
                        {{ $service->service_name }}
                    </option>
                @endforeach

            </select>
        </td>

        <td>
            <input type="number"
                   name="items[${index}][quantity]"
                   class="form-control qty"
                   value="1"
                   oninput="calc()">
        </td>

        <td>
            <button type="button"
                    class="btn btn-danger btn-sm"
                    onclick="removeRow(this)">
                X
            </button>
        </td>

    </tr>`;

    document.getElementById('serviceBody').insertAdjacentHTML('beforeend', row);

    index++;
}

function removeRow(btn) {
    btn.closest('tr').remove();
    calc();
}
function calc() {

    let subtotal = 0;

    document.querySelectorAll('#serviceBody tr').forEach(row => {

        let select = row.querySelector('.service');
        let qty = row.querySelector('.qty');

        if (select && select.selectedOptions.length > 0) {

            let price = select.selectedOptions[0].dataset.price || 0;

            subtotal += price * (qty.value || 1);
        }
    });

    let vat = subtotal * 0.05; // 5%
    let total = subtotal + vat;

    document.getElementById('subtotal').innerText = subtotal.toFixed(2);
    document.getElementById('vat').innerText = vat.toFixed(2);
    document.getElementById('total').innerText = total.toFixed(2);
}
// function calc() {

//     let subtotal = 0;

//     document.querySelectorAll('#serviceBody tr').forEach(row => {

//         let select = row.querySelector('.service');
//         let qty = row.querySelector('.qty');

//         if (select && select.selectedOptions.length > 0) {

//             let price = select.selectedOptions[0].dataset.price || 0;

//             subtotal += price * (qty.value || 1);
//         }
//     });

//     let vat = subtotal * 0.15;
//     let total = subtotal + vat;

//     document.getElementById('subtotal').innerText = subtotal.toFixed(2);
//     document.getElementById('vat').innerText = vat.toFixed(2);
//     document.getElementById('total').innerText = total.toFixed(2);
// }
</script>

@endsection