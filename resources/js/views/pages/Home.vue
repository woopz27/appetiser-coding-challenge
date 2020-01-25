<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <span class="navbar-toggler-icon"></span>
  </nav>
  <br>
  <div class="container">
    <div class="card text-white mb-3 main-card">
      <div class="card-header">Calendar</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <label for="eventName">Event name</label>
            <input type="text" class="form-control" id="eventName" v-model="eventName">
            <div class="row">
              <div class="col-md-6">
                <br>
                <label for="datepickerFrom">From</label>
                <vuejs-datepicker input-class="datepicker" v-model="datepickerFrom" format="dd/MM/yyyy"></vuejs-datepicker>
              </div>
              <div class="col-md-6">
                <br>
                <label for="datepickerTo">To</label>
                <vuejs-datepicker input-class="datepicker" v-model="datepickerTo" format="dd/MM/yyyy"></vuejs-datepicker>
              </div>
            </div>
            <br>
            <div class="d-flex days-checkbox-section">
              <div class="d-flex days-checkbox-item">
                <input type="checkbox" name="" id="" v-model="checkedDays" value="1">
                <p>Sun</p>
              </div>
              <div class="d-flex days-checkbox-item">
                <input type="checkbox" name="" id="" v-model="checkedDays" value="2">
                <p>Mon</p>
              </div>
              <div class="d-flex days-checkbox-item">
                <input type="checkbox" name="" id="" v-model="checkedDays" value="3">
                <p>Tue</p>
              </div>
              <div class="d-flex days-checkbox-item">
                <input type="checkbox" name="" id="" v-model="checkedDays" value="4">
                <p>Wed</p>
              </div>
              <div class="d-flex days-checkbox-item">
                <input type="checkbox" name="" id="" v-model="checkedDays" value="5">
                <p>Thu</p>
              </div>
              <div class="d-flex days-checkbox-item">
                <input type="checkbox" name="" id="" v-model="checkedDays" value="6">
                <p>Fri</p>
              </div>
              <div class="d-flex days-checkbox-item">
                <input type="checkbox" name="" id="" v-model="checkedDays" value="7">
                <p>Sat</p>
              </div>
            </div>
            <div>
              <button class="btn btn-primary" @click="saveEvent">Save</button>
            </div>
          </div>
          <div class="col-md-8">
            <h2>{{ listOfMonths[month - 1] }} {{ year }}</h2>
            <ul class="list-group">
              <li class="list-group-item" :class="{'active': day.eventName.length > 0}" v-for="day in dayAndDayName">{{day.day}} {{day.dayName}} <p class="li-event-name">{{ day.eventName }}</p></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
</template>
<script>
  export default {
    data() {
      return {
        datepickerFrom: '',
        datepickerTo:'',
        dayAndDayName: [],
        checkedDays: [],
        listOfMonths:['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        month: '',
        year: '',
        eventName: '',
        toInsertData: [],
        events: []
      }
    },
    created: function() {
      this.displayTotalDays();
      this.getEvent();
    },
    watch: {
      datepickerTo: function () {
        console.log(this.datepickerTo);
      }
    },
    methods: {
        displayTotalDays(month = 0, year = 0) {
          let totalDays = (month === 0 && year === 0)? new Date().getDate() : new Date(year, month, 0).getDate();
          let options = {weekday: 'long'};
          this.dayAndDayName = [];
          this.month = (month === 0)? 1 : month;
          this.year = (year === 0)? new Date().getFullYear() : year;
          for(let i = 1; i <= totalDays; i++) {
            let monthFormatted = (month === 0 && year === 0)? new Date().getMonth() : new Date(year, month, 0).getMonth(); 
            let yearFormatted = (month === 0 && year === 0)? new Date().getFullYear() : new Date(year, month, 0).getFullYear();
            let date = new Date(yearFormatted, monthFormatted, i); 
            let dayName = new Intl.DateTimeFormat('en-US', options).format(date); 
            this.dayAndDayName.push({day: i, dayName: dayName, eventName: ''});
          }
        },
        setuptoInsertData(checkedDays, dayAndDayName, month, year, eventName, toDays) {
          let toInsertDataArrayTemp = [];
          for(let j = 0; j < checkedDays.length; j++) {
            switch (checkedDays[j]) {
              case '1':
                  for(let i = 0; i < toDays; i++) {
                    if(dayAndDayName[i].dayName == 'Sunday') {
                      toInsertDataArrayTemp.push({
                          year: year, 
                          month: month,
                          day: dayAndDayName[i].day,
                          event_name: eventName
                      });
                    }
                  }
                break;
              case '2':
                  for(let i = 0; i < toDays; i++) {
                    if(dayAndDayName[i].dayName == 'Monday') {
                      toInsertDataArrayTemp.push({
                          year: year, 
                          month: month,
                          day: dayAndDayName[i].day,
                          event_name: eventName
                      });
                    } 
                  }
                break;
              case '3':
                  for(let i = 0; i < toDays; i++) {
                    if(dayAndDayName[i].dayName == 'Tuesday') {
                      toInsertDataArrayTemp.push({
                          year: year, 
                          month: month,
                          day: dayAndDayName[i].day,
                          event_name: eventName
                      });
                    } 
                  }
                break;
              case '4':
                  for(let i = 0; i < toDays; i++) {
                    if(dayAndDayName[i].dayName == 'Wednesday') {
                      toInsertDataArrayTemp.push({
                          year: year, 
                          month: month,
                          day: dayAndDayName[i].day,
                          event_name: eventName
                      });
                    }
                  }
                break;
              case '5':
                  for(let i = 0; i < toDays; i++) {
                    if(dayAndDayName[i].dayName == 'Thursday') {
                      toInsertDataArrayTemp.push({
                          year: year, 
                          month: month,
                          day: dayAndDayName[i].day,
                          event_name: eventName
                      });
                    }
                  }
                break;
              case '6':
                  for(let i = 0; i < toDays; i++) {
                    if(dayAndDayName[i].dayName == 'Friday') {
                      toInsertDataArrayTemp.push({
                          year: year, 
                          month: month,
                          day: dayAndDayName[i].day,
                          event_name: eventName
                      });
                    }
                  }
                break;
              case '7':
                  for(let i = 0; i < toDays; i++) {
                    if(dayAndDayName[i].dayName == 'Saturday') {
                      toInsertDataArrayTemp.push({
                          year: year, 
                          month: month,
                          day: dayAndDayName[i].day,
                          event_name: eventName
                      });
                    }
                  }
                break;
            
              default:
                break;
            }
          }
          this.toInsertData = toInsertDataArrayTemp;
        },
        saveEvent() {
          let datepickerFrom = new Date(this.datepickerFrom);
          let datepickerTo = new Date(this.datepickerTo);
          if(this.eventName == '' || this.datepickerFrom == '' || this.datepickerTo == '' || this.checkedDays.length == 0) {

            toastr.error('', 'Please do not empty the forms!');

          } else if((datepickerTo.getMonth() < datepickerFrom.getMonth() || datepickerTo.getFullYear() < datepickerFrom.getFullYear()) || (datepickerTo.getMonth() == datepickerFrom.getMonth() && datepickerTo.getDate() < datepickerFrom.getDate())) { 
          
            toastr.error('', 'Please make the datepickerto higher that datepickerfrom');

          } else {

            this.displayTotalDays(datepickerFrom.getMonth() + 1, datepickerFrom.getFullYear());
            this.setuptoInsertData(this.checkedDays, this.dayAndDayName, this.month, this.year, this.eventName, datepickerTo.getDate());
            axios.post('/api/save-event',{
              data: this.toInsertData
            }).then(response => {
              if(response.data) {
                this.getEvent();
                toastr.success('', 'Event successfully saved!');
              }
            });

          }
        },
        getEvent() {
          axios.get('/api/get-event').then(response => {
            let events = response.data;
            let dayAndDayName = this.dayAndDayName;
            for(let j = 0; j < events.length; j++) {
              for(let i = 0; i < this.dayAndDayName.length; i++) {
                  if(this.dayAndDayName[i].day == events[j].event_day) {
                    this.dayAndDayName[i].eventName = events[j].event_name;
                  }
              }
            }
          });
        }
    },
    components: {
      vuejsDatepicker
    }
  }
</script>