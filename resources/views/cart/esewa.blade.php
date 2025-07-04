<form action="https://rc.esewa.com.np/epay/main" method="POST" id="esewaPayForm">
    <input value="{{ $totalAmount }}" name="tAmt" type="hidden">
    <input value="{{ $amount }}" name="amt" type="hidden">
    <input value="{{ $tax }}" name="txAmt" type="hidden">
    <input value="{{ $serviceCharge }}" name="psc" type="hidden">
    <input value="{{ $deliveryCharge }}" name="pdc" type="hidden">
    <input value="{{ $pid }}" name="pid" type="hidden">
    <input value="{{ route('esewa.success') }}" type="hidden" name="su">
    <input value="{{ route('esewa.fail') }}" type="hidden" name="fu">
</form>

<script>
    document.getElementById('esewaPayForm').submit();
</script>
