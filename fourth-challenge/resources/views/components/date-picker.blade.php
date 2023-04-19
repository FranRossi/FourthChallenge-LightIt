@props(['typeOfCity'])

<div id="{{ $typeOfCity === 'departure' ? 'date1' : 'date2' }}">
    <Datepicker :min-date="minDate" v-model="{{ $typeOfCity === 'departure' ? 'departure' : 'arrival' }}">
    </Datepicker>
</div>

<script>
    const {{ $typeOfCity }} = Vue.createApp({
        components: { Datepicker: VueDatePicker },
        data() {
            return {
                arrival: null,
                departure: null,
            }
        },
    }).mount("#{{ $typeOfCity === 'departure' ? 'date1' : 'date2' }}");
</script>
