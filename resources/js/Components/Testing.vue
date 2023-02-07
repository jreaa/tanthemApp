<template>
  <div>
    <div class="card">
      <div class="card-body">
           <FullCalendar :options="calendarOptions" />
      </div>
    </div>
  </div>
</template>
<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
     components: {
        FullCalendar // make the <FullCalendar> tag available
    },
    data(){
        return {
            calendarOptions: {
                plugins: [ dayGridPlugin, interactionPlugin ],
                initialView: 'dayGridMonth',
                initialView: 'dayGridMonth',
                events: [
                { title: 'event 1', date: '2021-06-01' },
                { title: 'event 2', date: '2021-05-02' }
                ]
            }

        }
    },

};
</script>