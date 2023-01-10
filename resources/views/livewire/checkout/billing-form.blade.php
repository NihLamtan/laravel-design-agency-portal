<div>
    @include('partials.alerts')
    
{{-- </div> --}}
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('paymentMethodUpdated', function() {
            // document.getElementById('payment-method').value = paymentMethod;
            // @this.payment_method = paymentMethod;
            document.getElementById('submit-button').click();  
        });
    })
</script>
</div>

