
    <div id="date">
        <Datepicker range :min-date="minDate" ref="onDateSelected">
        </Datepicker>
    </div>

    <script>

        const app = Vue.createApp({
            components: { Datepicker: VueDatePicker },
            data() {
                return {
                    minDate: null,
                }
            },
            methods: {
                onDateSelected(date) {
                    console.log(date);
                    if (!this.minDate){
                        this.minDate = date;
                    }
                }
            }
        }).mount("#date");
    </script>
