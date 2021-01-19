@extends('layouts.app')

@section('content')
    @if($orders)
        @foreach($orders as $order)
            <div class="card border-secondary m-3 item-card @if($order->payment_status == 1) disable_card @endif">
                <div class="card-header">
                    <div class="fw-light">
                        <div class="d-flex flex-row bd-highlight justify-content-between">
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                @csrf
                                <a href="{{ route('order.edit', $order->id) }}" class="btn btn-outline-primary change-link" @if($order->payment_status == 1) style="pointer-events: none; color: #999; border-color: #999" @endif>Изменить</a>
                                <input type="hidden" name="_method" value="delete" />
                                <button type="submit" class="btn btn-outline-danger delete-button" @if($order->payment_status == 1) disabled @endif>Удалить</button>
                            </form>
                            <div name="select-pay-type" class="d-flex">
                                <select @if($order->payment_status == 1) disabled @endif onchange="selectPayTypeFunction(this)" class="mr-1 pay-type-select" data-type="pay-type" data-order-id="{{ $order->id }}">
                                    @foreach($paytypes as $paytype)
                                        <option value="{{ $paytype->id }}" @if($paytype->id == $order->paytype_id) selected @endif>{{ $paytype->title }}</option>
                                    @endforeach
                                </select>
                                <button onclick="checkPaymentStatusByOrderId(this, {{ $order->id }})" type="button" class="btn @if($order->payment_status == 0)btn-outline-success">Оплатить@else btn-outline-secondary">Вернуть@endif</button>
                            </div>
                        </div>
                        Заказ: {{ $order->id }} | {{ $order->table->title }}  | Сотрудник: {{ $order->user->name }}  | {{ $order->created_at }}
                    </div>
                </div>
                <div class="card-body text-secondary">
                    @if($order->menu)
                        <table class="table table-striped">
                            <tbody>
                                @foreach($order->menu as $menuItem)
                                    <tr>
                                        <th scope="row">{{ $menuItem->title }}</th>
                                        <td>{{ $menuItem->count }}</td>
                                        <td>{{ $menuItem->price }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="total_price">
                                        {{ $order->total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('script')
    <script>
        function selectPayTypeFunction(select) {
            let selectValue = select.value;
            let orderId = select.getAttribute('data-order-id');

            const payTypeRequest = new XMLHttpRequest();
            const payTypeUrl = "/order/" + orderId + "/pay-type/" + selectValue;

            payTypeRequest.open("PUT", payTypeUrl, true);
            payTypeRequest.setRequestHeader("Content-type", "application/json");
            payTypeRequest.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");

            payTypeRequest.addEventListener("readystatechange", () => {
                if (payTypeRequest.readyState === 4 && payTypeRequest.status === 200) {
                    console.log(payTypeRequest.responseText);
                }
            });
            payTypeRequest.send();
        }

        function checkPaymentStatusByOrderId(el, orderId) {
            const checkPaymentStatusRequest = new XMLHttpRequest();
            const checkPaymentStatusUrl = "/order/check-payment-status/" + orderId;

            checkPaymentStatusRequest.open("GET", checkPaymentStatusUrl);
            checkPaymentStatusRequest.setRequestHeader("Content-type", "application/json");

            checkPaymentStatusRequest.addEventListener("readystatechange", () => {
                if (checkPaymentStatusRequest.readyState === 4 && checkPaymentStatusRequest.status === 200) {
                   if (checkPaymentStatusRequest.responseText == 1) {
                       changePaymentButtonText(el, orderId, true)
                   } else {
                       changePaymentButtonText(el, orderId, false)
                   }
                }
            });
            checkPaymentStatusRequest.send();
        }

        function changePaymentButtonText(el, orderId, flag) {
            let status;
            let card = el.parentElement.parentElement.parentElement.parentElement.parentElement;
            if (!flag) {
                el.className = 'btn btn-outline-secondary';
                el.innerHTML = 'Вернуть';

                status = 1;

                card.classList.add("disable_card");

                let formButton = card.querySelector(".delete-button");
                formButton.setAttribute("disabled", "disabled");

                let changeLink = card.querySelector(".change-link");
                changeLink.classList.add('disable_link')

                let payTypeSelect = card.querySelector(".pay-type-select");
                payTypeSelect.setAttribute("disabled", "disabled");
            } else {
                el.className = 'btn btn-outline-success';
                el.innerHTML = 'Оплатить';

                status = 0;

                card.classList.remove("disable_card");

                let formButton = card.querySelector(".delete-button");
                formButton.removeAttribute('disabled');

                let changeLink = card.querySelector(".change-link");
                changeLink.classList.remove('disable_link')

                let payTypeSelect = card.querySelector(".pay-type-select");
                payTypeSelect.removeAttribute("disabled");
            }


            const changePaymentStatusRequest = new XMLHttpRequest();
            const changePaymentStatusUrl = "/order/" + orderId + "/payment-status/" + status;

            changePaymentStatusRequest.open("PUT", changePaymentStatusUrl, true);
            changePaymentStatusRequest.setRequestHeader("Content-type", "application/json");
            changePaymentStatusRequest.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");

            changePaymentStatusRequest.addEventListener("readystatechange", () => {
                if (changePaymentStatusRequest.readyState === 4 && changePaymentStatusRequest.status === 200) {
                    //console.log(changePaymentStatusRequest.responseText)
                }
            });
            changePaymentStatusRequest.send();
        }
    </script>
@endsection
