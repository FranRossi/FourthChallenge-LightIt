<x-layout>

    <div id="date">
        <Datepicker>
            Llego
        </Datepicker>
    </div>

    <script>
        const app = Vue.createApp({
            components: { Datepicker: VueDatePicker },
        }).mount("#date");
    </script>

</x-layout>
